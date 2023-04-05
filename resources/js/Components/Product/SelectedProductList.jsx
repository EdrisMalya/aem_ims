import React from 'react'
import { IconButton } from '@mui/material'
import { MinusIcon, PencilIcon, PlusIcon } from '@heroicons/react/20/solid'
import { TrashIcon } from '@heroicons/react/24/solid'
import ProductDetailsModel from '@/Components/Product/ProductDetailsModel'
import { usePage } from '@inertiajs/inertia-react'

const SelectedProductList = ({
    translate,
    selectedProducts,
    setSelectedProducts,
    product,
    setProduct,
    data,
    setData,
    setDeleteFromParent,
    disabledEditing = false,
}) => {
    const [productDetails, setProductDetails] = React.useState(false)
    const { system_setting } = usePage().props
    const changeNumber = (event, type, product, otherData) => {
        const productIndex = selectedProducts.findIndex(
            p => p.name_with_code === product.name_with_code,
        )

        switch (type) {
            case 'increment':
                product.qty += 1
                if (productIndex !== -1) {
                    // Create a new array with the updated product
                    const newProducts = [
                        ...selectedProducts.slice(0, productIndex),
                        product,
                        ...selectedProducts.slice(productIndex + 1),
                    ]
                    setSelectedProducts(newProducts)
                } else {
                    setSelectedProducts([product, ...selectedProducts])
                }
                break
            case 'decrement':
                const check = product.qty - 1
                if (check > 0) {
                    product.qty -= 1
                    if (productIndex !== -1) {
                        // Create a new array with the updated product
                        const newProducts = [
                            ...selectedProducts.slice(0, productIndex),
                            product,
                            ...selectedProducts.slice(productIndex + 1),
                        ]
                        setSelectedProducts(newProducts)
                    } else {
                        setSelectedProducts([product, ...selectedProducts])
                    }
                }
                break
            case 'input':
                const value = parseInt(event.target.value)
                if (value > 0) {
                    if (productIndex !== -1) {
                        const newProduct = { ...product, qty: value }
                        const newProducts = [
                            ...selectedProducts.slice(0, productIndex),
                            newProduct,
                            ...selectedProducts.slice(productIndex + 1),
                        ]
                        setSelectedProducts(newProducts)
                    } else {
                        const newProduct = { ...product, qty: value }
                        setSelectedProducts([newProduct, ...selectedProducts])
                    }
                }
                break
            case 'change_product_detail':
                if (productIndex !== -1) {
                    const newProduct = {
                        ...product,
                        discount: otherData.discount,
                        int_cost: otherData.cost,
                        discount_type: otherData.discount_type,
                        purchase_unit: {
                            id: otherData.purchase_unit.value,
                            name: otherData.purchase_unit.label,
                        },
                    }
                    const newProducts = [
                        ...selectedProducts.slice(0, productIndex),
                        newProduct,
                        ...selectedProducts.slice(productIndex + 1),
                    ]
                    setSelectedProducts(newProducts)
                } else {
                    setSelectedProducts([...product, ...selectedProducts])
                }
        }
    }

    const handleDeleteProduct = product => {
        setDeleteFromParent(true)
        setProduct(product)
    }

    const productSubTotal = product => {
        switch (product.discount_type) {
            case 'fixed':
                return Math.abs(
                    parseInt(product.int_cost) * product.qty - product.discount,
                ).toLocaleString()
            case 'percentage':
                let percent_price =
                    (product.discount * parseInt(product.int_cost)) / 100
                return Math.abs(
                    (parseInt(product.int_cost) - percent_price) * product.qty,
                ).toLocaleString()
        }
    }

    const updateGrandTotal = () => {
        let newProductsArray = selectedProducts.slice()
        let price_list = newProductsArray.map(item => {
            let result = item.int_cost * item.qty
            switch (item.discount_type) {
                case 'fixed':
                    result = result - item.discount
                    break
                case 'percentage':
                    let percent_price =
                        (item.discount * parseInt(item.int_cost)) / 100
                    result =
                        (parseInt(item.int_cost) - percent_price) * item.qty
            }
            return result
        })
        let sum = price_list.reduce(function (a, b) {
            return a + b
        }, 0)
        sum = sum + parseInt(data.order_tax)
        sum = sum + parseInt(data.shipping)
        let discount = (sum * data.discount) / 100
        sum = sum - discount
        sum = sum - data.due

        setData('grand_total', sum)
    }

    React.useEffect(() => {
        updateGrandTotal()
    }, [selectedProducts, data])

    React.useEffect(() => {
        setData('products', selectedProducts)
    }, [selectedProducts])

    return (
        <div>
            <div className={'overflow-x-auto'}>
                <table
                    className={
                        'w-full text-center border dark:border-gray-800'
                    }>
                    <thead className={'dark:bg-gray-800'}>
                        <tr>
                            <th className={'py-2 px-5 whitespace-nowrap'}>
                                {translate('Product')}
                            </th>
                            <th className={'py-2 px-5 whitespace-nowrap'}>
                                {translate('Purchase unit')}
                            </th>
                            <th className={'py-2 px-5 whitespace-nowrap'}>
                                {translate('Net Unit Cost')}
                            </th>
                            <th className={'py-2 px-5 whitespace-nowrap'}>
                                {translate('Quantity')}
                            </th>
                            <th className={'py-2 px-5 whitespace-nowrap'}>
                                {translate('DISCOUNT')}
                            </th>
                            <th className={'py-2 px-5 whitespace-nowrap'}>
                                {translate('SUBTOTAL')}
                            </th>
                            {!disabledEditing && (
                                <th className={'py-2 px-5 whitespace-nowrap'}>
                                    {translate('ACTION')}
                                </th>
                            )}
                        </tr>
                    </thead>
                    <tbody>
                        {selectedProducts.length > 0 ? (
                            selectedProducts?.map((product, index) => (
                                <tr
                                    key={index}
                                    className={'border-b dark:border-gray-700'}>
                                    <td>
                                        <div
                                            className={
                                                'py-3 flex text-center items-center justify-center space-x-1'
                                            }>
                                            <div>
                                                {product.name}
                                                <p
                                                    className={
                                                        'text-xs -mt-0 bg-green-500 px-1 rounded-xl'
                                                    }>
                                                    {product.code}
                                                </p>
                                            </div>
                                            <div>
                                                {!disabledEditing && (
                                                    <IconButton
                                                        onClick={() => {
                                                            setProduct(product)
                                                            setProductDetails(
                                                                true,
                                                            )
                                                        }}
                                                        size={'small'}
                                                        color={'warning'}>
                                                        <PencilIcon
                                                            className={'h-4'}
                                                        />
                                                    </IconButton>
                                                )}
                                            </div>
                                        </div>
                                    </td>
                                    <td>{product.purchase_unit.name}</td>
                                    <td>
                                        {product.currency_symbol}{' '}
                                        {Math.abs(
                                            product.int_cost,
                                        ).toLocaleString()}
                                    </td>
                                    <td>
                                        {disabledEditing ? (
                                            product.qty
                                        ) : (
                                            <div
                                                className={
                                                    'flex items-center justify-between border border-blue-500 w-40 mx-auto rounded-xl overflow-hidden'
                                                }>
                                                <div
                                                    onClick={() =>
                                                        changeNumber(
                                                            event,
                                                            'decrement',
                                                            product,
                                                        )
                                                    }
                                                    className={
                                                        'bg-blue-600 p-2 cursor-pointer select-none'
                                                    }>
                                                    <MinusIcon
                                                        className={'h-5'}
                                                    />
                                                </div>
                                                <div>
                                                    <input
                                                        onChange={event =>
                                                            changeNumber(
                                                                event,
                                                                'input',
                                                                product,
                                                            )
                                                        }
                                                        value={Math.abs(
                                                            product.qty,
                                                        ).toLocaleString()}
                                                        className={
                                                            'bg-transparent w-full h-full text-center outline-0'
                                                        }
                                                    />
                                                </div>
                                                <div
                                                    onClick={() =>
                                                        changeNumber(
                                                            event,
                                                            'increment',
                                                            product,
                                                        )
                                                    }
                                                    className={
                                                        'bg-blue-600 p-2 cursor-pointer select-none'
                                                    }>
                                                    <PlusIcon
                                                        className={'h-5'}
                                                    />
                                                </div>
                                            </div>
                                        )}
                                    </td>
                                    <td>
                                        {product.discount_type === 'fixed'
                                            ? product.currency_symbol
                                            : '%'}{' '}
                                        {product.discount}
                                    </td>
                                    <td>
                                        {product.currency_symbol}{' '}
                                        {productSubTotal(product)}
                                    </td>
                                    {!disabledEditing && (
                                        <td>
                                            <IconButton
                                                onClick={() =>
                                                    handleDeleteProduct(product)
                                                }
                                                color={'error'}>
                                                <TrashIcon className={'h-4'} />
                                            </IconButton>
                                        </td>
                                    )}
                                </tr>
                            ))
                        ) : (
                            <tr>
                                <td
                                    colSpan={10}
                                    className={'text-red-500 py-5'}>
                                    {translate('No record found')}
                                </td>
                            </tr>
                        )}
                    </tbody>
                </table>
            </div>
            <div className={'mt-6 grid grid-cols-8'}>
                <div className={'col-span-5'} />
                <div className={'col-span-3'}>
                    <table className={'border dark:border-gray-700 w-full'}>
                        <tr className={'border-b dark:border-gray-700'}>
                            <td className={'py-3 px-5'} width={180}>
                                {translate('Order Tax')}
                            </td>
                            <td>
                                {system_setting.data.currency.symbol}{' '}
                                {data.order_tax}
                            </td>
                        </tr>
                        <tr className={'border-b dark:border-gray-700'}>
                            <td className={'py-3 px-5'} width={180}>
                                {translate('Discount')}
                            </td>
                            <td>% {data.discount}</td>
                        </tr>
                        <tr className={'border-b dark:border-gray-700'}>
                            <td className={'py-3 px-5'} width={180}>
                                {translate('Shipping')}
                            </td>
                            <td>
                                {system_setting.data.currency.symbol}{' '}
                                {data.shipping}
                            </td>
                        </tr>
                        <tr
                            className={
                                'border-b dark:border-gray-700 text-blue-500'
                            }>
                            <td className={'py-3 px-5'} width={180}>
                                {translate('Grand Total')}
                            </td>
                            <td>
                                {system_setting.data.currency.symbol}{' '}
                                {Math.abs(data.grand_total).toLocaleString()}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            {productDetails && (
                <ProductDetailsModel
                    product={product}
                    translate={translate}
                    onClose={data => {
                        setProduct(null)
                        setProductDetails(false)
                        changeNumber(
                            event,
                            'change_product_detail',
                            data.product,
                            data,
                        )
                    }}
                />
            )}
        </div>
    )
}

export default SelectedProductList
