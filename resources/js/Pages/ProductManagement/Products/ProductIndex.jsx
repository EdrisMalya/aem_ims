import React from 'react'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import useLanguage from '@/hooks/useLanguage'
import ProductManagementLinks from '@/Pages/ProductManagement/ProductManagementLinks'
import ProtectedComponent from '@/Components/ProtectedComponent'
import { Button } from '@mui/material'
import { PlusIcon } from '@heroicons/react/24/solid'
import { Link } from '@inertiajs/inertia-react'

const ProductIndex = ({ lang }) => {
    const { translate } = useLanguage()
    return (
        <Authenticated
            active={'product-management'}
            title={translate('Products')}
            navBarOptions={<ProductManagementLinks translate={translate} />}>
            <div className={'flex items-center justify-between'}>
                <h1 className={'text-xl'}>
                    {translate('List of all products')}
                </h1>
                <ProtectedComponent role={'product-add-product'}>
                    <Link href={route('product.create', { lang })}>
                        <Button
                            variant={'outlined'}
                            endIcon={<PlusIcon className={'h-4'} />}>
                            {translate('Add new product')}
                        </Button>
                    </Link>
                </ProtectedComponent>
            </div>
        </Authenticated>
    )
}

export default ProductIndex
