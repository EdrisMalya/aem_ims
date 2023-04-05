import React from 'react'
import {
    Button,
    Dialog,
    DialogActions,
    DialogContent,
    DialogContentText,
    DialogTitle,
    FormControlLabel,
    Switch,
    TextField,
} from '@mui/material'
import { LoadingButton } from '@mui/lab'
import SaveIcon from '@mui/icons-material/Save'
import CloseIcon from '@mui/icons-material/Close'
import { useForm, usePage } from '@inertiajs/inertia-react'
import BasicDatePicker from '@/Components/Datepicker'
import MUISelect from '@/Components/MUISelect'
import Select2 from '@/Components/Select2'
import { Inertia } from '@inertiajs/inertia'

const PurchaseFilterModel = ({ translate, onClose, item }) => {
    const [warehouses, setWarehouses] = React.useState(undefined)
    const [suppliers, setSuppliers] = React.useState(undefined)
    const [paymentType, setPaymentType] = React.useState(undefined)
    const [processing, setProcessing] = React.useState(false)

    const { lang } = usePage().props

    const handleClose = () => {
        setProcessing(false)
        onClose()
    }

    const { setData, data, errors, put } = useForm({
        date_from: item?.date_from ? item?.date_from : null,
        date_to: item?.date_to ? item?.date_to : null,
        status: item?.status,
        due: item?.due == 1,
        warehouse: item?.warehouse
            ? {
                  label: item.warehouse.label,
                  value: item.warehouse.value,
              }
            : null,
        supplier: item?.supplier
            ? {
                  label: item.supplier.label,
                  value: item.supplier.value,
              }
            : null,
        payment_type: item?.payment_type
            ? {
                  label: item.payment_type.label,
                  value: item.payment_type.value,
              }
            : null,
        filter: true,
    })

    const handleChange = event => {
        setData(event.target.name, event.target.value)
    }

    const handleSubmit = event => {
        event.preventDefault()
        setProcessing(true)
        Inertia.get(
            route('purchase.index', {
                lang,
                date_from: data.date_from,
                date_to: data.date_to,
                status: data.status,
                warehouse: data?.warehouse,
                supplier: data?.supplier,
                payment_type: data?.payment_type,
                due: data.due,
                filter: data.filter,
            }),
            {},
            {
                onSuccess: () => {
                    handleClose()
                },
            },
        )
    }

    React.useEffect(() => {
        axios
            .get(route('partial', { lang, type: 'fetch_warehouse' }))
            .then(res => {
                setWarehouses(res.data)
            })
        axios
            .get(route('partial', { lang, type: 'fetch_suppliers' }))
            .then(res => setSuppliers(res.data))
        axios
            .get(route('partial', { lang, type: 'fetch_payment_type' }))
            .then(res => setPaymentType(res.data))
    }, [])

    return (
        <Dialog open={true} maxWidth={'sm'} fullWidth={true}>
            <DialogTitle>{translate('Purchase filter')}</DialogTitle>
            <form onSubmit={handleSubmit}>
                <DialogContent>
                    <DialogContentText className={'grid grid-cols-2 gap-2'}>
                        <BasicDatePicker
                            value={data.date_from}
                            onChange={date => setData('date_from', date)}
                            label={translate('Purchase added from')}
                            fullWidth={true}
                        />
                        <BasicDatePicker
                            value={data.date_to}
                            onChange={date => setData('date_to', date)}
                            label={translate('Purchase added to')}
                            fullWidth={true}
                        />
                        <div className={'col-span-2'}>
                            <MUISelect
                                label={translate('Status')}
                                onChange={event =>
                                    setData('status', event.target.value)
                                }
                                value={data.status}
                                options={[
                                    {
                                        label: translate('Received'),
                                        value: 'received',
                                    },
                                    {
                                        label: translate('Pending'),
                                        value: 'pending',
                                    },
                                    {
                                        label: translate('Ordered'),
                                        value: 'ordered',
                                    },
                                ]}
                            />
                        </div>
                        <div className={'col-span-2'}>
                            <Select2
                                data={warehouses}
                                label={translate('Warehouse')}
                                value={data.warehouse}
                                onChange={data => {
                                    setData('warehouse', data)
                                }}
                                selectLabel={'name'}
                                selectValue={'id'}
                            />
                        </div>
                        <div className={'col-span-2'}>
                            <Select2
                                error={errors.supplier}
                                data={suppliers}
                                label={translate('Suppliers')}
                                onChange={data => {
                                    setData('supplier', data)
                                }}
                                value={data.supplier}
                                selectLabel={'name'}
                                selectValue={'id'}
                            />
                        </div>
                        <div className={'col-span-2'}>
                            <Select2
                                error={errors.payment_type}
                                data={paymentType}
                                label={translate('Payment type')}
                                onChange={data => {
                                    setData('payment_type', data)
                                }}
                                value={data.payment_type}
                                selectLabel={'name'}
                                selectValue={'id'}
                            />
                        </div>
                        <div>
                            <FormControlLabel
                                control={
                                    <Switch
                                        checked={data.due}
                                        onChange={event =>
                                            setData('due', event.target.checked)
                                        }
                                    />
                                }
                                label={translate('Show due purchases')}
                            />
                        </div>
                    </DialogContentText>
                </DialogContent>
                <DialogActions>
                    <LoadingButton
                        color={'success'}
                        type={'submit'}
                        variant={'outlined'}
                        loading={processing}
                        endIcon={<SaveIcon />}>
                        {translate('Save')}
                    </LoadingButton>
                    <Button
                        type={'button'}
                        endIcon={<CloseIcon />}
                        color={'error'}
                        onClick={handleClose}
                        variant={'outlined'}>
                        {translate('Close')}
                    </Button>
                </DialogActions>
            </form>
        </Dialog>
    )
}

export default PurchaseFilterModel
