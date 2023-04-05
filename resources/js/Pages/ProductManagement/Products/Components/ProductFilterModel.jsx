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
} from '@mui/material'
import { LoadingButton } from '@mui/lab'
import SaveIcon from '@mui/icons-material/Save'
import CloseIcon from '@mui/icons-material/Close'
import { useForm, usePage } from '@inertiajs/inertia-react'
import BasicDatePicker from '@/Components/Datepicker'
import Select2 from '@/Components/Select2'
import { Inertia } from '@inertiajs/inertia'

const ProductFilterModel = ({ translate, onClose, item, filters }) => {
    const [brand, setBrand] = React.useState(undefined)
    const [category, setCategory] = React.useState(undefined)
    const [unit, setUnit] = React.useState(undefined)
    const [loading, setLoading] = React.useState(false)

    const { lang } = usePage().props

    const handleClose = () => {
        onClose()
    }

    const { post, processing, setData, data, errors, put, get } = useForm({
        filter: true,
        from_date: filters?.from_date ? filters?.from_date : null,
        to_date: filters?.to_date ? filters?.to_date : null,
        brands: filters?.brands ? JSON.parse(filters?.brands) : [],
        units: filters?.units ? JSON.parse(filters?.units) : [],
        categories: filters?.categories ? JSON.parse(filters?.categories) : [],
        show_deleted: filters?.show_deleted === '1',
    })

    const handleChange = event => {
        setData(event.target.name, event.target.value)
    }

    const handleSubmit = event => {
        event.preventDefault()
        setLoading(true)
        let categories = JSON.stringify(
            data.categories.map(item => {
                return {
                    label: item.label,
                    value: item.value,
                }
            }),
        )
        let brands = JSON.stringify(
            data.brands.map(item => {
                return {
                    label: item.label,
                    value: item.value,
                }
            }),
        )
        let units = JSON.stringify(
            data.units.map(item => {
                return {
                    label: item.label,
                    value: item.value,
                }
            }),
        )
        /*console.log(categories)
        return false*/
        if (!item) {
            Inertia.get(
                route('product.index', {
                    lang,
                    from_date: data.from_date,
                    to_date: data.to_date,
                    brands: brands,
                    units: units,
                    categories: categories,
                    show_deleted: data.show_deleted,
                    filter: true,
                }),
                {
                    onSuccess: () => {
                        handleClose()
                    },
                },
            )
        } else {
            put(route('route.update', { lang, item: item.id }), {
                onSuccess: () => {
                    handleClose()
                },
            })
        }
    }

    const fetchBrand = () => {
        axios
            .get(route('partial', { lang, type: 'fetch_brand' }))
            .then(res => setBrand(res.data))
    }

    const fetchUnits = () => {
        axios
            .get(route('partial', { lang, type: 'fetch_units' }))
            .then(res => setUnit(res.data))
    }

    const fetchCategories = () => {
        axios
            .get(route('partial', { lang, type: 'fetch_categories' }))
            .then(res => setCategory(res.data))
    }

    React.useEffect(() => {
        fetchUnits()
        fetchBrand()
        fetchCategories()
    }, [])

    return (
        <Dialog open={true} maxWidth={'sm'} fullWidth={true}>
            <DialogTitle>{translate('Filter products')}</DialogTitle>
            <form onSubmit={handleSubmit}>
                <DialogContent>
                    <DialogContentText>
                        <div>
                            <p className={'col-span-2'}>
                                {translate('Product created at')}
                            </p>
                            <div
                                className={
                                    'grid grid-cols-2 gap-3 pl-4 my-3 border-l dark:border-gray-500'
                                }>
                                <BasicDatePicker
                                    value={data.from_date}
                                    onChange={date =>
                                        setData('from_date', date)
                                    }
                                    label={translate('From date')}
                                />
                                <BasicDatePicker
                                    value={data.to_date}
                                    onChange={date => setData('to_date', date)}
                                    label={translate('To date')}
                                />
                            </div>
                        </div>
                        <div className={'mt-3 space-y-2'}>
                            <div>
                                <Select2
                                    isMulti={true}
                                    data={category}
                                    error={errors.categories}
                                    value={data.categories}
                                    onChange={data =>
                                        setData('categories', data)
                                    }
                                    placeholder={translate(
                                        'Choose Product Category',
                                    )}
                                    selectLabel={'name'}
                                    selectValue={'id'}
                                    label={translate('Product category')}
                                />
                            </div>
                            <div className={'col-span-2'}>
                                <Select2
                                    isMulti={true}
                                    data={unit}
                                    error={errors.units}
                                    value={data.units}
                                    onChange={data => setData('units', data)}
                                    placeholder={translate(
                                        'Choose Product unit',
                                    )}
                                    selectLabel={'name'}
                                    selectValue={'id'}
                                    label={translate('Product unit')}
                                />
                            </div>
                            <div className={'col-span-2'}>
                                <Select2
                                    isMulti={true}
                                    data={brand}
                                    error={errors.brands}
                                    value={data.brands}
                                    onChange={data => setData('brands', data)}
                                    placeholder={translate(
                                        'Choose Product Brand',
                                    )}
                                    selectLabel={'name'}
                                    selectValue={'id'}
                                    label={translate('Product brand')}
                                />
                            </div>
                            <FormControlLabel
                                control={
                                    <Switch
                                        checked={data.show_deleted}
                                        onChange={event =>
                                            setData(
                                                'show_deleted',
                                                event.target.checked,
                                            )
                                        }
                                    />
                                }
                                label={translate('Show deleted')}
                            />
                        </div>
                        {/*<TextField
                            onChange={handleChange}
                            value={data.name}
                            error={errors.name}
                            helperText={errors.name}
                            name={'name'}
                            size={'small'}
                            label={translate('Name')}
                        />*/}
                    </DialogContentText>
                </DialogContent>
                <DialogActions>
                    <LoadingButton
                        color={'success'}
                        type={'submit'}
                        variant={'outlined'}
                        loading={loading}
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

export default ProductFilterModel
