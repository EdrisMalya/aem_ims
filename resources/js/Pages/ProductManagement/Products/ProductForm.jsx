import React from 'react'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import useLanguage from '@/hooks/useLanguage'
import ProductManagementLinks from '@/Pages/ProductManagement/ProductManagementLinks'
import { useForm } from '@inertiajs/inertia-react'
import { TextField } from '@mui/material'
import ImageSelector from '@/Components/ImageSelector'
import Select2 from '@/Components/Select2'
import MUISelect from '@/Components/MUISelect'
import CostInput from '@/Components/CostInput'
import Editor from '@/Components/Editor'
import SaveAltIcon from '@mui/icons-material/SaveAlt'
import { LoadingButton } from '@mui/lab'
import ItemCreationForm from '@/Pages/ProductManagement/Products/Components/ItemCreationForm'

const ProductForm = ({
    active,
    categories,
    brand,
    unites,
    warehouse,
    suppliers,
    lang,
    system_setting,
    edit_form = false,
    product,
}) => {
    const [addItem, setAddItem] = React.useState({
        show: false,
        module: null,
        value: null,
    })
    const { translate } = useLanguage()
    const handleChange = event => {
        setData(event.target.name, event.target.value)
    }
    const { setData, errors, post, data, processing } = useForm({
        name: product ? product.data.name : null,
        code: product ? product.data.code : null,
        image: product ? product.data.image : null,
        product_brand: product
            ? {
                  label: product.data.brand.name,
                  value: product.data.brand.id,
              }
            : null,
        product_category: product
            ? {
                  label: product.data.category.name,
                  value: product.data.category.id,
              }
            : null,
        barcode_symbology: product ? product.data.barcode_symbology : null,
        product_cost: product ? product.data.int_cost : null,
        product_price: product ? product.data.int_price : null,
        product_unit: product
            ? {
                  label: product.data.unit.name,
                  value: product.data.unit.id,
              }
            : null,
        sale_unit: product
            ? {
                  label: product.data.sale_unit.name,
                  value: product.data.sale_unit.id,
              }
            : null,
        purchase_unit: product
            ? {
                  label: product.data.purchase_unit.name,
                  value: product.data.purchase_unit.id,
              }
            : null,
        stock_alert: product ? product.data.stock_alert : null,
        note: product ? product.data.note : null,
        warehouse: null,
        supplier: null,
        product_quantity: null,
        status: null,
        currency_id: system_setting?.data?.currency?.id,
    })

    const handleSubmit = event => {
        event.preventDefault()
        if (product) {
            post(
                route('product.update', {
                    lang,
                    _method: 'PUT',
                    product: product.data.id,
                }),
            )
        } else {
            post(route('product.store', { lang }))
        }
    }

    /*
    React.useEffect(() => {
        if (typeof product !== 'undefined') {
            setData('name', product.data.name)
            setData('code', product.data.code)
            setData('product_brand', {
                label: product.data.brand.name,
                value: product.data.brand.id,
            })
        }
    }, [product])
*/

    return (
        <Authenticated
            active={'product-management'}
            title={translate('product form')}
            navBarOptions={
                <ProductManagementLinks translate={translate} active={active} />
            }>
            <h2 className={'text-xl'}>
                {translate('Add new product to store')}
            </h2>
            <form onSubmit={handleSubmit}>
                <div className={`grid grid-cols-12 gap-3`}>
                    <div
                        className={`mt-8 bg-gray-800 shadow-lg p-8 rounded-xl ${
                            edit_form ? 'col-span-12' : 'col-span-8'
                        }`}>
                        <p className={'text-xl mb-4'}>
                            {translate('Product information')}
                        </p>
                        <div className={'grid grid-cols-3 gap-3'}>
                            <TextField
                                onChange={handleChange}
                                placeholder={translate('Enter Name')}
                                value={data.name}
                                error={errors.name}
                                helperText={errors.name}
                                name={'name'}
                                size={'small'}
                                label={translate('Product name')}
                                required={true}
                            />
                            <TextField
                                onChange={handleChange}
                                placeholder={translate('Enter Code')}
                                value={data.code}
                                error={errors.code}
                                helperText={errors.code}
                                name={'code'}
                                size={'small'}
                                label={translate('Code')}
                                required={true}
                            />
                            <ImageSelector
                                selectedImage={
                                    product ? product.data.image : null
                                }
                                onSelect={image => setData('image', image)}
                                className={
                                    'text-xs py-3 dark:hover:bg-gray-600'
                                }
                            />
                            <Select2
                                required={true}
                                data={brand.data}
                                error={errors.product_brand}
                                value={data.product_brand}
                                onChange={data =>
                                    setData('product_brand', data)
                                }
                                placeholder={translate('Choose Product Brand')}
                                selectLabel={'name'}
                                onCreated={value => {
                                    setAddItem({
                                        show: true,
                                        module: 'product-brand',
                                        value: value,
                                    })
                                }}
                                selectValue={'id'}
                                label={translate('Product brand')}
                            />
                            <Select2
                                onCreated={value => {
                                    setAddItem({
                                        show: true,
                                        module: 'product-category',
                                        value: value,
                                    })
                                }}
                                required={true}
                                data={categories.data}
                                error={errors.product_category}
                                value={data.product_category}
                                onChange={data =>
                                    setData('product_category', data)
                                }
                                placeholder={translate(
                                    'Choose Product Category',
                                )}
                                selectLabel={'name'}
                                selectValue={'id'}
                                label={translate('Product category')}
                            />
                            <MUISelect
                                options={[
                                    {
                                        label: translate('Code 128'),
                                        value: 128,
                                    },
                                    {
                                        label: translate('Code 39'),
                                        value: 39,
                                    },
                                ]}
                                value={data.barcode_symbology}
                                onChange={event =>
                                    setData(
                                        'barcode_symbology',
                                        event.target.value,
                                    )
                                }
                                label={translate('Barcode Symbology')}
                            />
                            <CostInput
                                error={errors.product_cost}
                                required={true}
                                value={data.product_cost}
                                onChange={data => setData('product_cost', data)}
                                label={translate('Product cost')}
                            />
                            <CostInput
                                error={errors.product_price}
                                required={true}
                                value={data.product_price}
                                onChange={data =>
                                    setData('product_price', data)
                                }
                                label={translate('Product price')}
                            />
                            <Select2
                                required={true}
                                data={unites.data}
                                error={errors.product_unit}
                                value={data.product_unit}
                                onChange={data => setData('product_unit', data)}
                                onCreated={value => {
                                    setAddItem({
                                        show: true,
                                        module: 'product-unit',
                                        value: value,
                                    })
                                }}
                                placeholder={translate('Choose Product unit')}
                                selectLabel={'name'}
                                selectValue={'id'}
                                label={translate('Product unit')}
                            />
                            <Select2
                                required={true}
                                data={unites.data}
                                value={data.sale_unit}
                                error={errors.sale_unit}
                                onChange={data => setData('sale_unit', data)}
                                placeholder={translate(
                                    'Choose product sale unit',
                                )}
                                onCreated={value => {
                                    setAddItem({
                                        show: true,
                                        module: 'product-unit',
                                        value: value,
                                    })
                                }}
                                selectLabel={'name'}
                                selectValue={'id'}
                                label={translate('Product sale unit')}
                            />
                            <Select2
                                error={errors.sale_unit}
                                required={true}
                                data={unites.data}
                                value={data.purchase_unit}
                                onChange={data =>
                                    setData('purchase_unit', data)
                                }
                                placeholder={translate(
                                    'Choose product purchase unit',
                                )}
                                onCreated={value => {
                                    setAddItem({
                                        show: true,
                                        module: 'product-unit',
                                        value: value,
                                    })
                                }}
                                selectLabel={'name'}
                                selectValue={'id'}
                                label={translate('Product purchase unit')}
                            />
                            <TextField
                                onChange={handleChange}
                                value={data.stock_alert}
                                error={errors.stock_alert}
                                helperText={errors.stock_alert}
                                name={'stock_alert'}
                                size={'small'}
                                type={'number'}
                                label={translate('Stock alert')}
                                required={true}
                            />
                            <div className={'col-span-3'}>
                                <p>{translate('Note ')}</p>
                                <Editor
                                    data={data.note}
                                    onChange={data => setData('note', data)}
                                    error={errors.note}
                                />
                            </div>
                        </div>
                    </div>
                    {!edit_form && (
                        <div
                            className={`mt-8 bg-gray-800 shadow-lg p-8 rounded-xl col-span-4`}>
                            <h4 className={'text-xl'}>
                                {translate('Add stock')}
                            </h4>
                            <div className={'grid grid-cols-1 gap-3 mt-4'}>
                                <Select2
                                    error={errors.warehouse}
                                    onCreated={value => {
                                        setAddItem({
                                            show: true,
                                            module: 'warehouse',
                                            value: value,
                                        })
                                    }}
                                    required={true}
                                    data={warehouse.data}
                                    value={data.warehouse}
                                    onChange={data =>
                                        setData('warehouse', data)
                                    }
                                    selectLabel={'name'}
                                    selectValue={'id'}
                                    label={translate('Warehouse')}
                                />
                                <Select2
                                    required={true}
                                    onCreated={value => {
                                        setAddItem({
                                            show: true,
                                            module: 'supplier',
                                            value: value,
                                        })
                                    }}
                                    error={errors.supplier}
                                    data={suppliers.data}
                                    value={data.supplier}
                                    onChange={data => setData('supplier', data)}
                                    selectLabel={'name'}
                                    selectValue={'id'}
                                    label={translate('Supplier')}
                                />
                                <TextField
                                    onChange={handleChange}
                                    value={data.product_quantity}
                                    error={errors.product_quantity}
                                    helperText={errors.product_quantity}
                                    type={'number'}
                                    name={'product_quantity'}
                                    size={'small'}
                                    label={translate('Product quantity')}
                                    required={true}
                                />
                                <MUISelect
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
                                    value={data.stock_status}
                                    error={errors.stock_status}
                                    onChange={data => {
                                        setData(
                                            'stock_status',
                                            data.target.value,
                                        )
                                    }}
                                    label={translate('Status')}
                                />
                            </div>
                        </div>
                    )}
                </div>
                <div className={'mt-4'}>
                    <LoadingButton
                        type={'submit'}
                        loading={processing}
                        endIcon={<SaveAltIcon />}
                        variant={'outlined'}
                        size={'large'}>
                        {translate('Save')}
                    </LoadingButton>
                </div>
            </form>
            <ItemCreationForm
                setOptions={setAddItem}
                translate={translate}
                options={addItem}
            />
        </Authenticated>
    )
}

export default ProductForm
