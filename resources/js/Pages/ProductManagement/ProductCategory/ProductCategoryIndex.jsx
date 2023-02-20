import React from 'react'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import useLanguage from '@/hooks/useLanguage'
import { Button } from '@mui/material'
import { PlusIcon } from '@heroicons/react/24/solid'
import Datatable from '@/Components/Datatable/Datatable'
import ProtectedComponent from '@/Components/ProtectedComponent'
import ProductCategoryForm from '@/Pages/ProductManagement/ProductCategory/ProductCategoryForm'
import ProductManagementLinks from '@/Pages/ProductManagement/ProductManagementLinks'

const ProductCategoryIndex = ({ productcategorys }) => {
    const [showForm, setShowForm] = React.useState(false)
    const [productcategory, setProductcategory] = React.useState(false)
    const { translate } = useLanguage()

    return (
        <Authenticated
            navBarOptions={<ProductManagementLinks translate={translate} />}
            active={'product-management'}
            title={translate('Product categories')}>
            <div className={'flex items-center justify-between'}>
                <h2 className={'text-xl'}>
                    {translate('List of product categories')}
                </h2>
                <ProtectedComponent role={'product-categories-access'}>
                    <Button
                        onClick={() => setShowForm(true)}
                        variant={'outlined'}
                        endIcon={<PlusIcon className={'h-4'} />}>
                        {translate('Add new record')}
                    </Button>
                </ProtectedComponent>
            </div>
            <div className={'mt-8'}>
                <Datatable
                    editRole={'product-categories-edit-category'}
                    deleteRole={'product-categories-delete-category'}
                    fromResource={true}
                    data={productcategorys}
                    handleEditAction={productcategory => {
                        setProductcategory(productcategory)
                        setShowForm(true)
                    }}
                    showNumber={true}
                    columns={[
                        {
                            name: translate('Product category logo'),
                            key: 'logo',
                            data_type: 'image',
                            className: 'w-12',
                        },
                        {
                            name: translate('Product category name'),
                            key: 'name',
                            sort: true,
                        },
                        {
                            name: translate('Created at'),
                            key: 'created_at',
                            sort: true,
                            data_type: 'date',
                            format: 'YYYY-MM-DD hh:mm A',
                        },
                    ]}
                />
            </div>
            {showForm && (
                <ProductCategoryForm
                    translate={translate}
                    onClose={() => {
                        setProductcategory(null)
                        setShowForm(false)
                    }}
                    productcategory={productcategory}
                />
            )}
        </Authenticated>
    )
}

export default ProductCategoryIndex
