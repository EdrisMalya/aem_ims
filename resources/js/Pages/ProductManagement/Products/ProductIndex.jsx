import React from 'react'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import useLanguage from '@/hooks/useLanguage'
import ProductManagementLinks from '@/Pages/ProductManagement/ProductManagementLinks'
import ProtectedComponent from '@/Components/ProtectedComponent'
import { Button } from '@mui/material'
import { PlusIcon } from '@heroicons/react/24/solid'
import { Link } from '@inertiajs/inertia-react'
import Datatable from '@/Components/Datatable/Datatable'
import RemoveRedEyeIcon from '@mui/icons-material/RemoveRedEye'
import { Inertia } from '@inertiajs/inertia'
import FilterAltIcon from '@mui/icons-material/FilterAlt'
import ProductFilterModel from '@/Pages/ProductManagement/Products/Components/ProductFilterModel'

const ProductIndex = ({ lang, products, filters }) => {
    const { translate } = useLanguage()
    const [filter, setFilter] = React.useState(false)
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
            <div className={'mt-8'}>
                <Datatable
                    data={products}
                    fromResource={true}
                    editRole={'product-edit-product'}
                    handleEditAction={data => {
                        Inertia.get(
                            route('product.edit', { lang, product: data.id }),
                        )
                    }}
                    deleteRole={'product-delete-product'}
                    datatableFilters={[
                        {
                            element: (
                                <Button
                                    onClick={() => setFilter(true)}
                                    endIcon={
                                        <FilterAltIcon fontSize={'small'} />
                                    }
                                    variant={'outlined'}>
                                    Filter
                                </Button>
                            ),
                        },
                    ]}
                    otherOptions={[
                        {
                            icon: (
                                <RemoveRedEyeIcon
                                    color={'primary'}
                                    fontSize={'small'}
                                />
                            ),
                            role: 'product-view-product-details',
                            handleClick: data => {
                                Inertia.get(
                                    route('product.show', {
                                        ...route().params,
                                        product: data.id,
                                    }),
                                )
                            },
                        },
                    ]}
                    columns={[
                        {
                            name: 'Product Name',
                            key: 'image',
                            className: 'w-12 h-12',
                            data_type: 'image',
                        },
                        {
                            name: 'Product Name',
                            key: 'name',
                            sort: true,
                        },
                        {
                            name: 'Category',
                            key: 'category.name',
                            sort: true,
                        },
                        {
                            name: 'Product code',
                            key: 'code',
                            sort: true,
                            className:
                                'p-1 bg-green-500 text-white rounded-lg text-xs',
                        },
                        {
                            name: 'Brand',
                            key: 'brand.name',
                        },
                        {
                            name: 'Price',
                            key: 'price',
                            sort: true,
                            className: 'whitespace-nowrap',
                        },
                        {
                            name: 'Unit',
                            key: 'unit.name',
                            className:
                                'p-1 bg-green-500 text-white rounded-lg text-xs',
                        },
                        {
                            name: 'In stock',
                            key: 'in_stock',
                            sort: true,
                        },
                        {
                            name: 'Created on',
                            key: 'created_at',
                            data_type: 'date',
                            format: 'YYYY-MM-DD hh:mm A',
                            sort: true,
                        },
                    ]}
                />
            </div>
            {filter && (
                <ProductFilterModel
                    filters={filters}
                    translate={translate}
                    onClose={() => setFilter(false)}
                />
            )}
        </Authenticated>
    )
}

export default ProductIndex
