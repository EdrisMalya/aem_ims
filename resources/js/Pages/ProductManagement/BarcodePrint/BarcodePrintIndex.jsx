import React, { useRef } from 'react'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import ProductManagementLinks from '@/Pages/ProductManagement/ProductManagementLinks'
import useLanguage from '@/hooks/useLanguage'
import Select2 from '@/Components/Select2'
import SearchIcon from '@mui/icons-material/Search'
import {
    Button,
    CircularProgress,
    FormControlLabel,
    IconButton,
    Switch,
    TextField,
} from '@mui/material'
import DeleteIcon from '@mui/icons-material/Delete'
import PreviewIcon from '@mui/icons-material/Preview'
import RestartAltIcon from '@mui/icons-material/RestartAlt'
import PrintIcon from '@mui/icons-material/Print'
import ProductBarcodeAreaComponent from '@/Pages/ProductManagement/BarcodePrint/Componenets/ProductBarcodeAreaComponent'
import { useReactToPrint } from 'react-to-print'
import MUISelect from '@/Components/MUISelect'

const BarcodePrintIndex = ({ warehouses, lang }) => {
    const [warehouse, setWarehouse] = React.useState(null)
    const [products, setProducts] = React.useState(undefined)
    const [showResultBox, setShowResultBox] = React.useState(false)
    const [showBarcodesAres, setShowBarcodesAres] = React.useState(false)
    const [selectedIndex, setSelectedIndex] = React.useState(0)
    const [inputValue, setInputValue] = React.useState('')
    const [selectedProducts, setSelectedProducts] = React.useState([])
    const [printOptions, setPrintOptions] = React.useState({
        page_size: 40,
        show_product_name: true,
        show_company_name: true,
        show_price: true,
    })

    const printRef = useRef()

    const { translate } = useLanguage()

    const handleAddProducts = product => {
        setInputValue('')
        setShowResultBox(false)
        setSelectedIndex(0)
        setSelectedProducts(prevState => {
            let code_array = prevState?.map(item => item.code)
            if (!code_array.includes(product.code)) {
                let result = [{ ...product, qty: 10 }, ...prevState]
                return result
            } else {
                return prevState
            }
        })
    }

    const fetchProducts = () => {
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

    const handleSearch = event => {
        let value = event.target.value
        setInputValue(value)
        if (value) {
            setShowResultBox(true)
        } else {
            setShowResultBox(false)
        }
    }

    const handleProductSelect = product => {
        handleAddProducts(product)
    }

    const handleKeyDown = event => {
        if (inputValue) {
            switch (event.keyCode) {
                case 38:
                    setSelectedIndex(prevState => {
                        return prevState > 0 ? prevState - 1 : 0 // decrement the index until it reaches 0 and then stop
                    })
                    break
                case 40:
                    setSelectedIndex(prevState => {
                        return prevState < products.length - 1
                            ? prevState + 1
                            : products.length - 1
                    })
                    break
                case 13:
                    let product = products[selectedIndex]
                    handleAddProducts(product)
                    break
                case 27:
                    setInputValue('')
                    setShowResultBox(false)
                    setSelectedIndex(0)
            }
        }
    }

    const handleDeleteProduct = product => {
        setSelectedProducts(prevState => {
            return prevState.filter(item => item.id !== product.id)
        })
    }

    const handleQtyChange = (event, product) => {
        setShowBarcodesAres(false)
        let index = selectedProducts.findIndex(obj => {
            return obj.id === product.id
        })
        selectedProducts[index].qty = parseInt(event.target.value)
        setSelectedProducts(selectedProducts)
    }
    const handlePrint = useReactToPrint({
        content: () => printRef.current,
    })

    const handleReset = () => {
        setSelectedProducts([])
        setInputValue('')
        setShowResultBox(false)
        setShowBarcodesAres(false)
    }

    React.useEffect(() => {
        if (warehouse !== null) {
            fetchProducts()
        }
    }, [warehouse])

    return (
        <Authenticated
            navBarOptions={<ProductManagementLinks translate={translate} />}
            active={'product-management'}
            title={translate('Print barcode')}>
            <h2 className={'text-xl pb-4'}>{translate('Print barcode')}</h2>
            <div
                className={`max-w-7xl print:max-w-full mx-auto dark:bg-gray-800 p-8 rounded-xl`}>
                <div className={'grid grid-cols-8 gap-3'}>
                    <div className={'col-span-3'}>
                        <Select2
                            data={warehouses.data}
                            label={translate('Warehouse')}
                            onChange={data => {
                                setWarehouse(data.value)
                            }}
                            selectLabel={'name'}
                            selectValue={'id'}
                        />
                    </div>
                    {warehouse && (
                        <div className={'col-span-8'}>
                            {products ? (
                                <>
                                    <p>{translate('Products')}</p>
                                    <div
                                        className={
                                            'flex items-center border p-2 rounded dark:border-gray-600'
                                        }>
                                        <div className={'mx-2'}>
                                            <SearchIcon />
                                        </div>
                                        <div className={'flex-grow'}>
                                            <input
                                                value={inputValue}
                                                onKeyDown={handleKeyDown}
                                                onChange={handleSearch}
                                                placeholder={translate(
                                                    'Search product by code or name',
                                                )}
                                                className={
                                                    'bg-transparent outline-0 w-full'
                                                }
                                            />
                                        </div>
                                    </div>
                                    {showResultBox && (
                                        <div
                                            className={
                                                'border dark:border-gray-700 shadow-2xl'
                                            }>
                                            {products.length < 1 ? (
                                                <div
                                                    className={
                                                        'text-center py-4 text-red-500'
                                                    }>
                                                    {translate(
                                                        'No record found',
                                                    )}
                                                </div>
                                            ) : (
                                                products
                                                    ?.filter(item =>
                                                        item.name
                                                            .toLowerCase()
                                                            .includes(
                                                                inputValue.toLowerCase(),
                                                            ),
                                                    )
                                                    ?.map((product, index) => (
                                                        <div
                                                            key={index}
                                                            onClick={() =>
                                                                handleProductSelect(
                                                                    product,
                                                                )
                                                            }
                                                            className={`flex items-center space-x-3 p-2 cursor-pointer hover:bg-blue-500 ${
                                                                index ===
                                                                    selectedIndex &&
                                                                'bg-blue-600'
                                                            }`}>
                                                            <div>
                                                                <SearchIcon />
                                                            </div>
                                                            <div
                                                                className={
                                                                    'flex-grow'
                                                                }>
                                                                {product?.name}
                                                            </div>
                                                        </div>
                                                    ))
                                            )}
                                        </div>
                                    )}
                                </>
                            ) : (
                                <div className={'text-center'}>
                                    <CircularProgress size={30} />
                                </div>
                            )}
                            {selectedProducts.length > 0 && (
                                <div className={'mt-4'}>
                                    <table className={'w-full text-center'}>
                                        <thead className={'dark:bg-gray-700'}>
                                            <tr>
                                                <th className={'py-2'}>
                                                    {translate('Product')}
                                                </th>
                                                <th>{translate('Qty')}</th>
                                                <th>{translate('Action')}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {selectedProducts?.map(
                                                (product, index) => (
                                                    <tr
                                                        key={index}
                                                        className={
                                                            'border-b dark:border-gray-700'
                                                        }>
                                                        <td className={'p-2'}>
                                                            {product.name}
                                                        </td>
                                                        <td>
                                                            <TextField
                                                                onChange={event =>
                                                                    handleQtyChange(
                                                                        event,
                                                                        product,
                                                                    )
                                                                }
                                                                size={'small'}
                                                                type={'number'}
                                                                defaultValue={
                                                                    product.qty
                                                                }
                                                            />
                                                        </td>
                                                        <td>
                                                            <IconButton
                                                                onClick={() =>
                                                                    handleDeleteProduct(
                                                                        product,
                                                                    )
                                                                }
                                                                color={'error'}
                                                                size={'small'}>
                                                                <DeleteIcon
                                                                    fontSize={
                                                                        'small'
                                                                    }
                                                                />
                                                            </IconButton>
                                                        </td>
                                                    </tr>
                                                ),
                                            )}
                                        </tbody>
                                    </table>
                                    <div
                                        className={
                                            'flex items-center my-4 space-x-4'
                                        }>
                                        <div className={'flex-grow'}>
                                            <MUISelect
                                                value={printOptions.page_size}
                                                size={'small'}
                                                options={[
                                                    {
                                                        label: '40 per sheet (a4) (1.799 * 1.003)',
                                                        value: 40,
                                                    },
                                                    {
                                                        label: '30 per sheet (2.625 * 1)',
                                                        value: 30,
                                                    },
                                                    {
                                                        label: '24 per sheet (a4) (2.48 * 1.334)',
                                                        value: 24,
                                                    },
                                                    {
                                                        label: '20 per sheet (4 * 1)',
                                                        value: 20,
                                                    },
                                                ]}
                                                onChange={data => {
                                                    setPrintOptions(
                                                        prevState => {
                                                            return {
                                                                ...prevState,
                                                                page_size:
                                                                    data.target
                                                                        .value,
                                                            }
                                                        },
                                                    )
                                                }}
                                                label={translate('Page size')}
                                            />
                                        </div>
                                        <div>
                                            <FormControlLabel
                                                control={
                                                    <Switch
                                                        onChange={event => {
                                                            setPrintOptions(
                                                                prevState => {
                                                                    return {
                                                                        ...prevState,
                                                                        show_product_name:
                                                                            event
                                                                                .target
                                                                                .checked,
                                                                    }
                                                                },
                                                            )
                                                        }}
                                                        checked={
                                                            printOptions.show_product_name
                                                        }
                                                    />
                                                }
                                                label={translate(
                                                    'Show product name',
                                                )}
                                            />
                                        </div>
                                        <div>
                                            <FormControlLabel
                                                control={
                                                    <Switch
                                                        onChange={event => {
                                                            setPrintOptions(
                                                                prevState => {
                                                                    return {
                                                                        ...prevState,
                                                                        show_company_name:
                                                                            event
                                                                                .target
                                                                                .checked,
                                                                    }
                                                                },
                                                            )
                                                        }}
                                                        checked={
                                                            printOptions.show_company_name
                                                        }
                                                    />
                                                }
                                                label={translate(
                                                    'Show company name',
                                                )}
                                            />
                                        </div>
                                        <div>
                                            <FormControlLabel
                                                control={
                                                    <Switch
                                                        onChange={event => {
                                                            setPrintOptions(
                                                                prevState => {
                                                                    return {
                                                                        ...prevState,
                                                                        show_price:
                                                                            event
                                                                                .target
                                                                                .checked,
                                                                    }
                                                                },
                                                            )
                                                        }}
                                                        checked={
                                                            printOptions.show_price
                                                        }
                                                    />
                                                }
                                                label={translate('Show price')}
                                            />
                                        </div>
                                    </div>
                                    <div
                                        className={
                                            'flex items-center mt-3 space-x-3'
                                        }>
                                        <Button
                                            onClick={() =>
                                                setShowBarcodesAres(
                                                    prevState => !prevState,
                                                )
                                            }
                                            endIcon={<PreviewIcon />}
                                            color={'success'}
                                            size={'small'}
                                            variant={'contained'}>
                                            {translate('Preview')}
                                        </Button>
                                        <Button
                                            endIcon={<RestartAltIcon />}
                                            color={'error'}
                                            onClick={handleReset}
                                            size={'small'}
                                            variant={'contained'}>
                                            {translate('Reset')}
                                        </Button>
                                        <Button
                                            onClick={handlePrint}
                                            endIcon={<PrintIcon />}
                                            color={'primary'}
                                            size={'small'}
                                            variant={'contained'}>
                                            {translate('Print')}
                                        </Button>
                                    </div>
                                    {showBarcodesAres && (
                                        <ProductBarcodeAreaComponent
                                            printOptions={printOptions}
                                            selectedProducts={selectedProducts}
                                            ref={printRef}
                                            translate={translate}
                                        />
                                    )}
                                </div>
                            )}
                        </div>
                    )}
                </div>
            </div>
        </Authenticated>
    )
}

export default BarcodePrintIndex
