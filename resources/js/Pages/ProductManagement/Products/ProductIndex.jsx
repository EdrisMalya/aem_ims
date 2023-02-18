import React from 'react'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import useLanguage from '@/hooks/useLanguage'
import ProductManagementLinks from '@/Pages/ProductManagement/ProductManagementLinks'

const ProductIndex = () => {
    const { translate } = useLanguage()
    return (
        <Authenticated
            active={'product-management'}
            title={translate('Products')}
            navBarOptions={<ProductManagementLinks translate={translate} />}>
            test
        </Authenticated>
    )
}

export default ProductIndex
