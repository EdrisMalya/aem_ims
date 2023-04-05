import React from 'react'
import PurchaseManagementLinks from '@/Pages/PurchaseManagement/PurchaseManagementLinks'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import useLanguage from '@/hooks/useLanguage'
import Select2 from '@/Components/Select2'
import ProductSelector from '@/Components/ProductSelector'
import {
    Button,
    CircularProgress,
    FormControl,
    InputAdornment,
    InputLabel,
    OutlinedInput,
} from '@mui/material'
import BasicDatePicker from '@/Components/Datepicker'
import { useForm } from '@inertiajs/inertia-react'
import MUISelect from '@/Components/MUISelect'
import { LoadingButton } from '@mui/lab'
import SaveAltIcon from '@mui/icons-material/SaveAlt'
import CloseIcon from '@mui/icons-material/Close'
import SelectedProductList from '@/Components/Product/SelectedProductList'
import dayjs from 'dayjs'
import { Inertia } from '@inertiajs/inertia'

const PurchaseForm = ({
    warehouses,
    lang,
    suppliers,
    system_setting,
    purchase,
    payment_types,
    only_change_due,
}) => {
    const [deleteFromParent, setDeleteFromParent] = React.useState(false)
    const [productListRendered, setProductListRendered] = React.useState(false)
    const [product, setProduct] = React.useState(null)
    const [products, setProducts] = React.useState(undefined)
    const [selectedProducts, setSelectedProducts] = React.useState([])
    const { translate } = useLanguage()

    const { setData, post, data, processing, errors, put } = useForm({
        purchase_date: dayjs(new Date()).format('YYYY/MM/DD'),
        warehouse: purchase
            ? {
                  label: purchase.data.warehouse.name,
                  value: purchase.data.warehouse.id,
              }
            : {
                  label: system_setting.data.warehouse.name,
                  value: system_setting.data.warehouse.id,
              },
        supplier: purchase
            ? {
                  label: purchase.data.supplier.name,
                  value: purchase.data.supplier.id,
              }
            : null,
        products: [],
        order_tax: purchase ? purchase.data.order_tax : 0,
        discount: purchase ? purchase.data.discount : 0,
        shipping: purchase ? purchase.data.shipping : 0,
        grand_total: purchase ? purchase.data.int_grand_total : 0,
        due: purchase ? purchase.data.int_due : 0,
        status: purchase ? purchase.data.status : 'received',
        payment_type: purchase
            ? {
                  label: purchase.data.payment_type.name,
                  value: purchase.data.payment_type.id,
              }
            : null,
        only_change_due: only_change_due,
    })

    const fetchProducts = warehouse => {
        axios
            .get(
                route('partial', {
                    type: 'fetch-warehouse-products',
                    lang,
                    warehouse_id: warehouse,
                }),
            )
            .then(res => {
                setProducts(res.data.data)
            })
    }

    const handleSubmit = event => {
        event.preventDefault()
        if (purchase) {
            put(route('purchase.update', { lang, purchase: purchase.data.id }))
        } else {
            post(route('purchase.store', { lang }))
        }
    }

    React.useEffect(() => {
        fetchProducts(system_setting.data.warehouse.id)
    }, [system_setting])

    React.useEffect(() => {
        if (purchase) {
            let products = purchase.data.assigned_products.map(product => {
                return {
                    ...product.product,
                    qty: product.quantity,
                    discount: product.discount,
                    discount_type: product.discount_type,
                }
            })
            setData('products', products)
            if (productListRendered) {
                setSelectedProducts(products)
            }
        }
    }, [purchase, productListRendered])

    return (
        <Authenticated
            active={'purchase-management'}
            title={translate('Purchases')}
            navBarOptions={<PurchaseManagementLinks translate={translate} />}>
            <h2 className={'text-xl'}>{translate('Create purchase')}</h2>
            <div className={'grid grid-cols-8 gap-3 mt-4'}>
                <div className={'col-span-2'}>
                    <BasicDatePicker
                        disabled={only_change_due}
                        value={data.purchase_date}
                        onChange={date => setData('purchase_date', date)}
                        label={translate('Date')}
                    />
                </div>
                <div className={'col-span-3'}>
                    <Select2
                        disabled={selectedProducts.length > 0}
                        data={warehouses.data}
                        label={translate('Warehouse')}
                        value={data.warehouse}
                        onChange={data => {
                            setData('warehouse', data)
                            setProducts(undefined)
                            fetchProducts(data.value)
                        }}
                        selectLabel={'name'}
                        selectValue={'id'}
                    />
                </div>
                <div className={'col-span-3'}>
                    <Select2
                        disabled={only_change_due}
                        error={errors.supplier}
                        data={suppliers.data}
                        label={translate('Suppliers')}
                        onChange={data => {
                            setData('supplier', data)
                        }}
                        value={data.supplier}
                        selectLabel={'name'}
                        selectValue={'id'}
                    />
                </div>
                {data.warehouse && (
                    <div className={'col-span-8'}>
                        {products ? (
                            <form onSubmit={handleSubmit}>
                                <p>{translate('Products')}</p>
                                <ProductSelector
                                    disabled={only_change_due}
                                    error={errors.products}
                                    deleteFromParent={deleteFromParent}
                                    setDeleteFromParent={setDeleteFromParent}
                                    product={product}
                                    setProduct={setProduct}
                                    products={products}
                                    defaultProducts={selectedProducts}
                                    onRendered={() =>
                                        setProductListRendered(true)
                                    }
                                    translate={translate}
                                    onProductAdded={data => {
                                        setSelectedProducts(data)
                                    }}
                                />
                                <p className={'pt-3 pb-2'}>
                                    {translate('Order items')} *
                                </p>
                                <SelectedProductList
                                    disabledEditing={only_change_due}
                                    product={product}
                                    setProduct={setProduct}
                                    translate={translate}
                                    selectedProducts={selectedProducts}
                                    setDeleteFromParent={setDeleteFromParent}
                                    setSelectedProducts={setSelectedProducts}
                                    data={data}
                                    setData={setData}
                                />

                                <div className={'grid grid-cols-3 gap-5 mt-8'}>
                                    <FormControl
                                        disabled={only_change_due}
                                        fullWidth={true}
                                        size={'small'}>
                                        <InputLabel>
                                            {translate('Order Tax')}
                                        </InputLabel>
                                        <OutlinedInput
                                            id="outlined-adornment-amount"
                                            type="number"
                                            endAdornment={
                                                <InputAdornment position="end">
                                                    {
                                                        system_setting.data
                                                            .currency.symbol
                                                    }
                                                </InputAdornment>
                                            }
                                            onChange={event => {
                                                if (event.target.value >= 0) {
                                                    setData(
                                                        'order_tax',
                                                        event.target.value,
                                                    )
                                                }
                                            }}
                                            value={data.order_tax}
                                        />
                                    </FormControl>
                                    <FormControl
                                        disabled={only_change_due}
                                        fullWidth={true}
                                        size={'small'}>
                                        <InputLabel>
                                            {translate('Discount')}
                                        </InputLabel>
                                        <OutlinedInput
                                            id="outlined-adornment-amount"
                                            type="number"
                                            endAdornment={
                                                <InputAdornment position="end">
                                                    %
                                                </InputAdornment>
                                            }
                                            onChange={event => {
                                                if (
                                                    event.target.value >= 0 &&
                                                    event.target.value <= 100
                                                ) {
                                                    setData(
                                                        'discount',
                                                        event.target.value,
                                                    )
                                                }
                                            }}
                                            value={data.discount}
                                        />
                                    </FormControl>
                                    <FormControl
                                        disabled={only_change_due}
                                        fullWidth={true}
                                        size={'small'}>
                                        <InputLabel>
                                            {translate('Shipping')}
                                        </InputLabel>
                                        <OutlinedInput
                                            id="outlined-adornment-amount"
                                            endAdornment={
                                                <InputAdornment position="end">
                                                    {
                                                        system_setting.data
                                                            .currency.symbol
                                                    }
                                                </InputAdornment>
                                            }
                                            type={'number'}
                                            onChange={event => {
                                                if (event.target.value >= 0) {
                                                    setData(
                                                        'shipping',
                                                        event.target.value,
                                                    )
                                                }
                                            }}
                                            value={data.shipping}
                                        />
                                    </FormControl>
                                    <MUISelect
                                        disabled={only_change_due}
                                        label={translate('Status')}
                                        onChange={event =>
                                            setData(
                                                'status',
                                                event.target.value,
                                            )
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
                                    <Select2
                                        disabled={only_change_due}
                                        error={errors.payment_type}
                                        data={payment_types.data}
                                        label={translate('Payment types')}
                                        onChange={data => {
                                            setData('payment_type', data)
                                        }}
                                        value={data.payment_type}
                                        selectLabel={'name'}
                                        selectValue={'id'}
                                    />
                                    <FormControl
                                        fullWidth={true}
                                        size={'small'}>
                                        <InputLabel>
                                            {translate('Due amount')}
                                        </InputLabel>
                                        <OutlinedInput
                                            type="number"
                                            endAdornment={
                                                <InputAdornment position="end">
                                                    {
                                                        system_setting.data
                                                            .currency.symbol
                                                    }
                                                </InputAdornment>
                                            }
                                            onChange={event => {
                                                if (event.target.value >= 0) {
                                                    setData(
                                                        'due',
                                                        event.target.value,
                                                    )
                                                }
                                            }}
                                            value={data.due}
                                        />
                                    </FormControl>
                                </div>
                                <div className={'py-12 flex space-x-3'}>
                                    <LoadingButton
                                        loading={processing}
                                        endIcon={
                                            <SaveAltIcon fontSize={'small'} />
                                        }
                                        size={'large'}
                                        color={'success'}
                                        type={'submit'}
                                        variant={'outlined'}>
                                        {translate('Save')}
                                    </LoadingButton>
                                    <Button
                                        onClick={() => {
                                            Inertia.get(
                                                route('purchase.index', {
                                                    lang,
                                                }),
                                            )
                                        }}
                                        endIcon={
                                            <CloseIcon fontSize={'small'} />
                                        }
                                        size={'large'}
                                        color={'error'}
                                        variant={'outlined'}>
                                        {translate('Cancel')}
                                    </Button>
                                </div>
                            </form>
                        ) : (
                            <div className={'text-center'}>
                                <CircularProgress size={30} />
                            </div>
                        )}
                    </div>
                )}
            </div>
        </Authenticated>
    )
}

export default PurchaseForm
