import React from 'react'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import useLanguage from '@/hooks/useLanguage'
import ProductManagementLinks from '@/Pages/ProductManagement/ProductManagementLinks'

const ProductManagementIndex = () => {
    const { translate } = useLanguage()
    return (
        <Authenticated
            active={'product-management'}
            title={translate('ProductManagement management')}
            navBarOptions={<ProductManagementLinks translate={translate} />}>
            <div className={'text-center mt-64'}>
                <h2 className={'text-xl'}>
                    {translate('Welcome to product management page')}
                </h2>
            </div>
        </Authenticated>
    )
}

export default ProductManagementIndex
