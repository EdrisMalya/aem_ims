import React from 'react'
import SearchIcon from '@mui/icons-material/Search'

const ProductSelector = ({
    translate,
    products,
    onProductAdded,
    ignoreIds = [],
    deleteFromParent,
    setDeleteFromParent,
    product,
    error = '',
    onRendered,
    defaultProducts = [],
    disabled = false,
}) => {
    const [inputValue, setInputValue] = React.useState('')
    const [selectedIndex, setSelectedIndex] = React.useState(0)
    const [showResultBox, setShowResultBox] = React.useState(false)
    const [selectedProducts, setSelectedProducts] = React.useState([])

    const handleKeyDown = event => {
        switch (event.keyCode) {
            case 38:
                setSelectedIndex(prevState => {
                    return prevState > 0 ? prevState - 1 : 0 // decrement the index until it reaches 0 and then stop
                })
                break

            case 40:
                let index =
                    products
                        ?.filter(item =>
                            item.name_with_code
                                .toLowerCase()
                                .includes(inputValue.toLowerCase()),
                        )
                        ?.filter(item => !ignoreIds.includes(item?.id)).length -
                    1
                setSelectedIndex(prevState => {
                    return prevState < index ? prevState + 1 : index
                })
                break
            case 27:
                setInputValue('')
                setShowResultBox(false)
                setSelectedIndex(0)
                break
            case 13:
                event.preventDefault()
                let product = products
                    ?.filter(item =>
                        item.name_with_code
                            .toLowerCase()
                            .includes(inputValue.toLowerCase()),
                    )
                    ?.filter(item => !ignoreIds.includes(item?.id))[
                    selectedIndex
                ]
                if (inputValue && product) {
                    handleAddProducts(product)
                } else {
                    setInputValue('')
                }
                break
        }
    }

    const handleAddProducts = product => {
        setInputValue('')
        setShowResultBox(false)
        setSelectedIndex(0)
        setSelectedProducts(prevState => {
            const productIndex = prevState.findIndex(
                p => p.name_with_code === product.name_with_code,
            )
            if (productIndex !== -1) {
                product.qty += 1
                const new_product = [
                    ...prevState.slice(0, productIndex),
                    product,
                    ...prevState.slice(productIndex + 1),
                ]
                onProductAdded(new_product)
                return new_product
            } else {
                onProductAdded([...prevState, product])
                return [...prevState, product]
            }
        })
    }

    const handleProductSelect = product => {
        handleAddProducts(product)
    }

    const handleSearch = event => {
        setSelectedIndex(0)
        let value = event.target.value
        setInputValue(value)
        if (value) {
            setShowResultBox(true)
        } else {
            setShowResultBox(false)
        }
    }

    React.useEffect(() => {
        onRendered()
    }, [])

    React.useEffect(() => {
        if (deleteFromParent) {
            setSelectedProducts(prevState => {
                let updated_products = prevState.filter(
                    obj => obj.name_with_code !== product.name_with_code,
                )
                onProductAdded(updated_products)
                return updated_products
            })
            setDeleteFromParent(false)
        }
    }, [deleteFromParent])

    React.useEffect(() => {
        if (defaultProducts.length > 0) {
            setSelectedProducts(defaultProducts)
        }
    }, [defaultProducts])

    return (
        <div>
            <div
                className={`flex items-center border p-2 rounded dark:border-gray-600 ${
                    error !== '' && '!border-red-500'
                }`}>
                <div className={'mx-2'}>
                    <SearchIcon />
                </div>
                <div className={'flex-grow'}>
                    <input
                        value={inputValue}
                        disabled={disabled}
                        onKeyDown={handleKeyDown}
                        onChange={handleSearch}
                        placeholder={translate(
                            'Search product by code or name',
                        )}
                        className={'bg-transparent outline-0 w-full'}
                    />
                </div>
            </div>
            {error && <p className={'text-red-500'}>{error}</p>}
            <div className={'relative'}>
                {showResultBox && (
                    <div
                        className={
                            'border dark:border-gray-700 shadow-2xl absolute w-full'
                        }>
                        {products.length < 1 ? (
                            <div className={'text-center py-4 text-red-500'}>
                                {translate('No record found')}
                            </div>
                        ) : (
                            products
                                ?.filter(item =>
                                    item.name_with_code
                                        .toLowerCase()
                                        .includes(inputValue.toLowerCase()),
                                )
                                ?.filter(item => !ignoreIds.includes(item?.id))
                                ?.map((product, index) => (
                                    <div
                                        key={index}
                                        onClick={() =>
                                            handleProductSelect(product)
                                        }
                                        className={`flex items-center space-x-3 p-2 cursor-pointer hover:bg-blue-500 z-50 ${
                                            index === selectedIndex
                                                ? 'bg-blue-600'
                                                : 'dark:bg-gray-900 bg-white'
                                        }`}>
                                        <div>
                                            <SearchIcon />
                                        </div>
                                        <div className={'flex-grow'}>
                                            {product?.name_with_code}
                                        </div>
                                    </div>
                                ))
                        )}
                    </div>
                )}
            </div>
        </div>
    )
}

export default ProductSelector
