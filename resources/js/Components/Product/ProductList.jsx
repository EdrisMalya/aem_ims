import React from 'react'
import { usePage } from '@inertiajs/inertia-react'

const ProductList = ({ translate, products, model }) => {
    const { system_setting } = usePage().props

    const productSubTotal = product => {
        switch (product.discount_type) {
            case 'fixed':
                return Math.abs(
                    parseInt(product.product.int_cost) * product.quantity -
                        product.discount,
                ).toLocaleString()
            case 'percentage':
                let percent_price =
                    (product.discount * parseInt(product.product.int_cost)) /
                    100
                return Math.abs(
                    (parseInt(product.product.int_cost) - percent_price) *
                        product.quantity,
                ).toLocaleString()
        }
    }

    return (
        <div className={'overflow-x-auto px-8'}>
            <table className={'text-center w-full mt-3 text-sm'}>
                <thead className={'dark:bg-gray-600 bg-gray-100'}>
                    <tr>
                        <th className={'px-3 py-1 whitespace-nowrap'}>
                            {translate('Product')}
                        </th>
                        <th className={'px-3 py-1 whitespace-nowrap'}>
                            {translate('NET UNIT COST')}
                        </th>
                        <th className={'px-3 py-1 whitespace-nowrap'}>
                            {translate('QUANTITY')}
                        </th>
                        <th className={'px-3 py-1 whitespace-nowrap'}>
                            {translate('UNIT COST')}
                        </th>
                        <th className={'px-3 py-1 whitespace-nowrap'}>
                            {translate('DISCOUNT')}
                        </th>
                        <th className={'px-3 py-1 whitespace-nowrap'}>
                            {translate('SUBTOTAL')}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {products.map(product => (
                        <tr
                            key={product.id}
                            className={'border-b dark:border-gray-700'}>
                            <td className={'py-2'}>{product.product.name}</td>
                            <td className={'py-2'}>{product.product.cost}</td>
                            <td className={'py-2'}>{product.quantity}</td>
                            <td className={'py-2'}>{product.product.price}</td>
                            <td className={'py-2'}>
                                {product.discount_type === 'fixed'
                                    ? product.product.currency_symbol
                                    : '%'}{' '}
                                {product.discount}
                            </td>
                            <td>
                                {product.product.currency_symbol}{' '}
                                {productSubTotal(product)}
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
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
                                {model.data.order_tax}
                            </td>
                        </tr>
                        <tr className={'border-b dark:border-gray-700'}>
                            <td className={'py-3 px-5'} width={180}>
                                {translate('Discount')}
                            </td>
                            <td>% {model.data.discount}</td>
                        </tr>
                        <tr className={'border-b dark:border-gray-700'}>
                            <td className={'py-3 px-5'} width={180}>
                                {translate('Shipping')}
                            </td>
                            <td>
                                {system_setting.data.currency.symbol}{' '}
                                {model.data.shipping}
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
                                {model.data.grand_total}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    )
}

export default ProductList
