import React from 'react'
import {
    Button,
    CircularProgress,
    Dialog,
    DialogActions,
    DialogContent,
    DialogContentText,
    DialogTitle,
    TextField,
} from '@mui/material'
import { LoadingButton } from '@mui/lab'
import SaveIcon from '@mui/icons-material/Save'
import CloseIcon from '@mui/icons-material/Close'
import { useForm, usePage } from '@inertiajs/inertia-react'
import ImageSelector from '@/Components/ImageSelector'
import { Inertia } from '@inertiajs/inertia'
import Select2 from '@/Components/Select2'
import MUISelect from '@/Components/MUISelect'

const WarehouseForm = ({ translate, onClose, warehouse }) => {
    const { lang, provinces } = usePage().props

    const handleClose = () => {
        onClose()
    }

    const { post, processing, setData, data, errors, put } = useForm({
        name: warehouse?.name,
        email: warehouse?.email,
        phone_number: warehouse?.phone_number,
        address: warehouse?.address,
        province_id: warehouse
            ? {
                  label: warehouse?.province.name,
                  value: warehouse?.province.id,
              }
            : null,
        status: warehouse ? warehouse?.status : true,
    })

    const handleChange = event => {
        setData(event.target.name, event.target.value)
    }

    const handleSubmit = event => {
        event.preventDefault()
        if (!warehouse) {
            post(route('warehouse.store', { lang }), {
                onSuccess: () => {
                    handleClose()
                },
            })
        } else {
            post(
                route('warehouse.update', {
                    lang,
                    warehouse: warehouse.id,
                    _method: 'PUT',
                }),
                {
                    onSuccess: () => {
                        handleClose()
                    },
                    preserveState: false,
                },
            )
        }
    }

    React.useEffect(() => {
        if (typeof provinces == 'undefined') {
            Inertia.visit(route(route().current(), { ...route().params }), {
                only: ['provinces'],
                preserveState: true,
            })
        }
    }, [provinces])

    return (
        <Dialog open={true} maxWidth={'sm'} fullWidth={true}>
            <DialogTitle>
                {warehouse
                    ? translate('Edit warehouse')
                    : translate('Create warehouse')}
            </DialogTitle>
            <form onSubmit={handleSubmit} autoComplete={false}>
                <DialogContent>
                    <DialogContentText className={'grid grid-cols-1 gap-3'}>
                        {/*<ImageSelector
                            selectedImage={warehouse ? warehouse.image : null}
                            onSelect={image => setData('image', image)}
                            label={translate('Warehouse image')}
                        />*/}
                        <TextField
                            onChange={handleChange}
                            value={data.name}
                            error={errors.name}
                            helperText={errors.name}
                            name={'name'}
                            size={'small'}
                            label={translate('Name')}
                            required={true}
                        />
                        <TextField
                            onChange={handleChange}
                            value={data.email}
                            error={errors.email}
                            helperText={errors.email}
                            name={'email'}
                            size={'small'}
                            label={translate('Email')}
                        />
                        <TextField
                            onChange={handleChange}
                            value={data.phone_number}
                            error={errors.phone_number}
                            helperText={errors.phone_number}
                            name={'phone_number'}
                            size={'small'}
                            label={translate('Phone_number')}
                            required={true}
                        />
                        <TextField
                            onChange={handleChange}
                            value={data.address}
                            error={errors.address}
                            helperText={errors.address}
                            name={'address'}
                            size={'small'}
                            label={translate('Address')}
                            required={true}
                        />
                        <Select2
                            data={provinces}
                            selectLabel={'name'}
                            value={data.province_id}
                            selectValue={'id'}
                            label={translate('Provinces')}
                            onChange={data => {
                                setData('province_id', data)
                            }}
                        />
                        {warehouse ? (
                            <MUISelect
                                value={data.status}
                                onChange={event => {
                                    setData('status', event.target.value)
                                }}
                                label={translate('Warehouse status')}
                                options={[
                                    {
                                        label: translate('Active'),
                                        value: true,
                                    },
                                    {
                                        label: translate('In Active'),
                                        value: false,
                                    },
                                ]}
                            />
                        ) : (
                            <></>
                        )}
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

export default WarehouseForm
