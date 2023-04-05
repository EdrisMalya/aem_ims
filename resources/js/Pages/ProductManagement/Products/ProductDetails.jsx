import React from 'react'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import ProductManagementLinks from '@/Pages/ProductManagement/ProductManagementLinks'
import useLanguage from '@/hooks/useLanguage'
import Barcode from 'react-barcode'
import parse from 'html-react-parser'

const ProductDetails = ({ product }) => {
    const { translate } = useLanguage()
    return (
        <Authenticated
            title={translate('Product Details')}
            active={'product-management'}
            navBarOptions={<ProductManagementLinks translate={translate} />}>
            <h2 className={'text-xl'}>{translate('Product details')}</h2>
            <div
                className={
                    'p-5 border dark:border-gray-700 my-5 dark:bg-gray-800 rounded-xl grid grid-cols-8 gap-6'
                }>
                <div className={'col-span-5'}>
                    <div className={'text-center barcode'}>
                        <Barcode
                            textAlign={'center'}
                            background={'transparent'}
                            value={product.data.code}
                        />
                    </div>
                    <table className={'w-full mt-4'}>
                        <tr className={'border-b border-gray-700'}>
                            <th className={'py-2'}>
                                {translate('Product code')}
                            </th>
                            <td>{product.data.code}</td>
                        </tr>
                        <tr className={'border-b border-gray-700'}>
                            <th className={'py-2'}>{translate('Product')}</th>
                            <td>{product.data.name}</td>
                        </tr>
                        <tr className={'border-b border-gray-700'}>
                            <th className={'py-2'}>{translate('Category')}</th>
                            <td>{product.data.category.name}</td>
                        </tr>
                        <tr className={'border-b border-gray-700'}>
                            <th className={'py-2'}>{translate('Brand')}</th>
                            <td>{product.data.brand.name}</td>
                        </tr>
                        <tr className={'border-b border-gray-700'}>
                            <th className={'py-2'}>{translate('Cost')}</th>
                            <td>{product.data.cost}</td>
                        </tr>
                        <tr className={'border-b border-gray-700'}>
                            <th className={'py-2'}>{translate('Price')}</th>
                            <td>{product.data.price}</td>
                        </tr>
                        <tr className={'border-b border-gray-700'}>
                            <th className={'py-2'}>{translate('Unit')}</th>
                            <td>
                                <span
                                    className={'px-3 rounded-xl bg-green-500'}>
                                    {product.data.unit.name}
                                </span>
                            </td>
                        </tr>
                        <tr className={'border-b border-gray-700'}>
                            <th className={'py-2'}>
                                {translate('Stock alert')}
                            </th>
                            <td>{product.data.stock_alert}</td>
                        </tr>
                    </table>
                    {product?.note && (
                        <>
                            <p className={'my-3 text-lg'}>
                                {translate('Note')}
                            </p>
                            <div className={'prose my-4'}>
                                {parse(product.note)}
                            </div>
                        </>
                    )}
                </div>
                <div className={'col-span-3'}>
                    {product.data.image ? (
                        <img src={product.data.image} />
                    ) : (
                        <img
                            src={route().t.url + '/default_images/img-icon.svg'}
                        />
                    )}
                </div>
            </div>
            <div
                className={
                    'dark:border-gray-700 p-5 dark:bg-gray-800 rounded-xl'
                }>
                <table className={'w-full text-center'}>
                    <thead className={'dark:bg-gray-600'}>
                        <tr>
                            <th className={'py-2'}>{translate('Warehouse')}</th>
                            <th className={'py-2'}>{translate('Supplier')}</th>
                            <th className={'py-2'}>
                                {translate('Purchase unit')}
                            </th>
                            <th className={'py-2'}>{translate('Quantity')}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {product.data.inventory.map((item, index) => (
                            <tr
                                key={index}
                                className={'border-b dark:border-gray-700'}>
                                <td className={'py-2'}>
                                    {item.warehouse.name}
                                </td>
                                <td className={'py-2'}>{item.supplier.name}</td>
                                <td className={'py-2'}>
                                    {item.base_unit.name}
                                </td>
                                <td className={'py-2'}>
                                    <span
                                        className={
                                            'bg-blue-500 px-2 rounded-full'
                                        }>
                                        {item.quantity}
                                    </span>
                                </td>
                            </tr>
                        ))}
                        <tr>
                            <td colSpan={3}></td>
                            <td className={'py-3 font-bold'}>
                                {translate('Total')}
                                {': '} {product.data.in_stock}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </Authenticated>
    )
}

export default ProductDetails
