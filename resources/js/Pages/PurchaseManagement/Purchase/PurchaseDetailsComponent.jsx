import React from 'react'
import { Email, LocationOn, Person, Phone } from '@mui/icons-material'
import ProductList from '@/Components/Product/ProductList'

const PurchaseDetailsComponent = React.forwardRef(
    ({ translate, purchase }, ref) => {
        return (
            <div
                ref={ref}
                id={'print'}
                className={'print:!text-black print:py-8'}>
                <p className={'text-center text-lg'}>
                    {translate('Purchase details')}: {purchase.data.reference}
                </p>
                <div className={'px-5 mt-5'}>
                    <div className={'grid grid-cols-3 gap-3'}>
                        <div>
                            <div
                                className={
                                    'dark:bg-gray-700 bg-gray-200 p-3 text-center rounded-lg'
                                }>
                                <p>{translate('Supplier Info')}</p>
                            </div>
                            <div className={'text-sm m-3'}>
                                <div className={'flex items-center space-x-2'}>
                                    <div>
                                        <Person fontSize={'small'} />
                                    </div>
                                    <div>{purchase.data.supplier.name}</div>
                                </div>
                                <div className={'flex items-center space-x-2'}>
                                    <div>
                                        <Email fontSize={'small'} />
                                    </div>
                                    <div>{purchase.data.supplier.email}</div>
                                </div>
                                <div className={'flex items-center space-x-2'}>
                                    <div>
                                        <Phone fontSize={'small'} />
                                    </div>
                                    <div>
                                        {purchase.data.supplier.phone_number}
                                    </div>
                                </div>
                                <div className={'flex items-center space-x-2'}>
                                    <div>
                                        <LocationOn fontSize={'small'} />
                                    </div>
                                    <div>{purchase.data.supplier.address}</div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div
                                className={
                                    'dark:bg-gray-700 bg-gray-200 p-3 text-center rounded-lg'
                                }>
                                <p>{translate('Warehouse Info')}</p>
                            </div>
                            <div className={'text-sm m-3'}>
                                <div className={'flex items-center space-x-2'}>
                                    <div>
                                        <Person fontSize={'small'} />
                                    </div>
                                    <div>{purchase.data.warehouse.name}</div>
                                </div>
                                <div className={'flex items-center space-x-2'}>
                                    <div>
                                        <Email fontSize={'small'} />
                                    </div>
                                    <div>{purchase.data.warehouse.email}</div>
                                </div>
                                <div className={'flex items-center space-x-2'}>
                                    <div>
                                        <Phone fontSize={'small'} />
                                    </div>
                                    <div>
                                        {purchase.data.warehouse.phone_number}
                                    </div>
                                </div>
                                <div className={'flex items-center space-x-2'}>
                                    <div>
                                        <LocationOn fontSize={'small'} />
                                    </div>
                                    <div>{purchase.data.warehouse.address}</div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div
                                className={
                                    'dark:bg-gray-700 bg-gray-200 p-3 text-center rounded-lg'
                                }>
                                <p>{translate('Purchase Info')}</p>
                            </div>
                            <div className={'text-sm m-3'}>
                                <p>
                                    <span className={'font-bold'}>
                                        {translate('Reference')}:{' '}
                                    </span>
                                    {purchase.data.reference}
                                </p>
                                <p>
                                    <span className={'font-bold'}>
                                        {translate('Status')}:{' '}
                                    </span>
                                    <span
                                        className={
                                            'bg-green-500 px-1 rounded-xl'
                                        }>
                                        {purchase.data.status}
                                    </span>
                                </p>
                                <p>
                                    <span className={'font-bold'}>
                                        {translate('Due amount')}:{' '}
                                    </span>
                                    <span>
                                        {purchase.data.currency.symbol}{' '}
                                        {purchase.data.due}
                                    </span>
                                </p>
                                <p>
                                    <span className={'font-bold'}>
                                        {translate('Payment type')}:{' '}
                                    </span>
                                    <span>
                                        {purchase.data.payment_type.name}
                                    </span>
                                </p>
                                <p>
                                    <span className={'font-bold'}>
                                        {translate('Grand total')}:{' '}
                                    </span>
                                    <span>
                                        {purchase.data.currency.symbol}{' '}
                                        {purchase.data.grand_total}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        className={
                            'dark:bg-gray-700 bg-gray-200 p-3 mt-4 text-center rounded-lg'
                        }>
                        <p>{translate('ORDER SUMMARY')}</p>
                    </div>
                </div>
                <ProductList
                    translate={translate}
                    products={purchase.data.assigned_products}
                    model={purchase}
                />
            </div>
        )
    },
)
export default PurchaseDetailsComponent
