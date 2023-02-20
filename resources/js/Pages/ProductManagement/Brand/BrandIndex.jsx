import React from 'react'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import useLanguage from '@/hooks/useLanguage'
import { Button } from '@mui/material'
import { PlusIcon } from '@heroicons/react/24/solid'
import Datatable from '@/Components/Datatable/Datatable'
import ProtectedComponent from '@/Components/ProtectedComponent'
import BrandForm from '@/Pages/ProductManagement/Brand/BrandForm'
import ProductManagementLinks from '@/Pages/ProductManagement/ProductManagementLinks'

const BrandIndex = ({ brands }) => {
    const [showForm, setShowForm] = React.useState(false)
    const [brand, setBrand] = React.useState(false)
    const { translate } = useLanguage()

    return (
        <Authenticated
            active={'product-management'}
            navBarOptions={<ProductManagementLinks translate={translate} />}
            title={translate('Brands')}>
            <div className={'flex items-center justify-between'}>
                <h2 className={'text-xl'}>{translate('List of brands')}</h2>
                <ProtectedComponent role={'brand-create-brand'}>
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
                    showNumber={true}
                    editRole={'brand-edit-brand'}
                    deleteRole={'brand-delete-brand'}
                    fromResource={true}
                    data={brands}
                    handleEditAction={brand => {
                        setBrand(brand)
                        setShowForm(true)
                    }}
                    columns={[
                        {
                            name: translate('Image'),
                            key: 'image',
                            data_type: 'image',
                            className: 'w-14 ',
                        },
                        {
                            name: translate('Name'),
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
                <BrandForm
                    translate={translate}
                    onClose={() => {
                        setBrand(null)
                        setShowForm(false)
                    }}
                    brand={brand}
                />
            )}
        </Authenticated>
    )
}

export default BrandIndex
