import React from 'react'
import Barcode from 'react-barcode'
import { usePage } from '@inertiajs/inertia-react'

const ProductBarcodeAreaComponent = React.forwardRef(
    ({ translate, selectedProducts, printOptions }, ref) => {
        const timestamp = new Date().getTime()
        const { lang, system_setting } = usePage().props

        const sizeSelector = () => {
            switch (printOptions.page_size) {
                case 40:
                    return 'w-[25%]'
                case 30:
                    return 'w-[33.33333333%]'
                case 24:
                    return 'w-[50%]'
                case 20:
                    return 'w-[100%]'
                default:
                    return 'w-[124.131px] h-[96.288px]'
            }
        }

        return (
            <div className={'mt-4'}>
                <div
                    ref={ref}
                    id={'print'}
                    className={'max-w-[816px] mt-12 mx-auto'}
                    style={{
                        pageBreakAfter: 'always',
                    }}>
                    <div>
                        {selectedProducts?.map((product, index) => (
                            <div
                                key={index}
                                className={'border border-dashed p-4 my-6'}>
                                <div className={'flex flex-wrap'}>
                                    {Array.from(
                                        { length: product.qty },
                                        (_, i) => i + 1,
                                    )?.map(item => (
                                        <div
                                            className={`border border-dashed dark:border-gray-500 barcode text-center ${sizeSelector()}`}>
                                            {printOptions.show_company_name && (
                                                <p
                                                    className={
                                                        'text-xs mt-3 print:!text-black'
                                                    }>
                                                    {system_setting.data.name}
                                                </p>
                                            )}
                                            {printOptions.show_price && (
                                                <p
                                                    className={
                                                        'text-xs mt-3 -mt-0 print:!text-black'
                                                    }>
                                                    <span
                                                        className={'font-bold'}>
                                                        {translate('Price')}:{' '}
                                                    </span>
                                                    {product.price}
                                                </p>
                                            )}
                                            <div className={'-mt-0'}>
                                                <Barcode
                                                    width={1}
                                                    height={30}
                                                    background={'transparent'}
                                                    fontSize={15}
                                                    value={timestamp + index}
                                                />
                                            </div>
                                            {printOptions.show_product_name && (
                                                <p
                                                    className={
                                                        'text-xs -mt-1 pb-2 print:!text-black'
                                                    }>
                                                    {product.name}
                                                </p>
                                            )}
                                        </div>
                                    ))}
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </div>
        )
    },
)
export default ProductBarcodeAreaComponent
