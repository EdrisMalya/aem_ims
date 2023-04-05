import React from 'react'
import {
    Button,
    Dialog,
    DialogActions,
    DialogContent,
    DialogContentText,
    DialogTitle,
    TextField,
} from '@mui/material'
import CostInput from '@/Components/CostInput'
import MUISelect from '@/Components/MUISelect'
import { useForm, usePage } from '@inertiajs/inertia-react'
import Select2 from '@/Components/Select2'

const ProductDetailsModel = ({ translate, product, onClose }) => {
    const [purchaseUnit, setPurchaseUnit] = React.useState(undefined)
    const { lang } = usePage().props

    const handleClose = data => {
        onClose(data)
    }

    const { data, setData } = useForm({
        cost: product.int_cost,
        discount_type: product.discount_type,
        discount: product.discount,
        purchase_unit: {
            label: product.purchase_unit.name,
            value: product.purchase_unit.id,
        },
        product: product,
    })

    const handleSave = event => {
        event.preventDefault()
        handleClose(data)
    }

    React.useEffect(() => {
        if (purchaseUnit === undefined) {
            axios
                .get(route('partial', { lang, type: 'fetch_units' }))
                .then(res => setPurchaseUnit(res.data))
        }
    }, [purchaseUnit])

    return (
        <Dialog open={true} fullWidth={true} maxWidth={'sm'}>
            <DialogTitle>{product.name}</DialogTitle>
            <DialogContent>
                <DialogContentText className={'pt-3 grid grid-cols-1 gap-2'}>
                    <CostInput
                        label={translate('Product cost')}
                        value={data.cost}
                        onChange={value => setData('cost', parseInt(value))}
                    />
                    <MUISelect
                        label={translate('Discount type')}
                        value={data.discount_type}
                        onChange={event =>
                            setData('discount_type', event.target.value)
                        }
                        options={[
                            {
                                label: translate('Fixed'),
                                value: 'fixed',
                            },
                            {
                                label: translate('Percentage'),
                                value: 'percentage',
                            },
                        ]}
                    />
                    <TextField
                        size={'small'}
                        value={data.discount}
                        type={'number'}
                        onChange={event =>
                            setData('discount', parseInt(event.target.value))
                        }
                        label={translate('Discount')}
                    />
                    <Select2
                        data={purchaseUnit}
                        value={data.purchase_unit}
                        onChange={value => setData('purchase_unit', value)}
                        selectValue={'id'}
                        selectLabel={'name'}
                    />
                </DialogContentText>
            </DialogContent>
            <DialogActions>
                <Button
                    onClick={handleSave}
                    variant={'outlined'}
                    color={'success'}
                    size={'small'}>
                    {translate('Save')}
                </Button>
                <Button
                    onClick={handleClose}
                    variant={'outlined'}
                    color={'error'}
                    size={'small'}>
                    {translate('Cancel')}
                </Button>
            </DialogActions>
        </Dialog>
    )
}

export default ProductDetailsModel
