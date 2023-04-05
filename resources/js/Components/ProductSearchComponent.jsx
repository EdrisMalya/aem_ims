import React from 'react'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import ProductManagementLinks from '@/Pages/ProductManagement/ProductManagementLinks'
import useLanguage from '@/hooks/useLanguage'
import Select2 from '@/Components/Select2'
import SearchIcon from '@mui/icons-material/Search'
import { CircularProgress } from '@mui/material'

const ProductSearchComponent = ({ warehouses, lang }) => {
    const [warehouse, setWarehouse] = React.useState(null)
    const [products, setProducts] = React.useState(undefined)
    const [showResultBox, setShowResultBox] = React.useState(false)
    const [selectedIndex, setSelectedIndex] = React.useState(0)
    const [inputValue, setInputValue] = React.useState('')
    const [selectedProducts, setSelectedProducts] = React.useState([])

    const { translate } = useLanguage()

    const handleAddProducts = product => {
        setInputValue('')
        setShowResultBox(false)
        setSelectedIndex(0)
        setSelectedProducts(prevState => {
            let code_array = prevState?.map(item => item.code)
            if (!code_array.includes(product.code)) {
                let result = [product, ...prevState]
                console.log(result)
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
            }
        }
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
                className={'max-w-7xl mx-auto dark:bg-gray-800 p-8 rounded-xl'}>
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
                                                        item.name_with_code
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
                                                                {
                                                                    product?.name_with_code
                                                                }
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
                            <div className={'mt-4'}>
                                <table>
                                    <thead>
                                        <tr>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    )}
                </div>
            </div>
        </Authenticated>
    )
}

export default ProductSearchComponent
