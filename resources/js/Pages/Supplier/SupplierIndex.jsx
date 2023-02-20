import React from 'react'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import useLanguage from '@/hooks/useLanguage'
import { Button } from '@mui/material'
import { PlusIcon } from '@heroicons/react/24/solid'
import Datatable from '@/Components/Datatable/Datatable'
import ProtectedComponent from '@/Components/ProtectedComponent'
import SupplierForm from '@/Pages/Supplier/SupplierForm'
import UserManagementLinks from '@/Pages/UserManagement/UserManagementLinks'

const SupplierIndex = ({ suppliers, provinces, active }) => {
    const [showForm, setShowForm] = React.useState(false)
    const [supplier, setSupplier] = React.useState(false)
    const { translate } = useLanguage()

    return (
        <Authenticated
            active={'user_management'}
            navBarOptions={<UserManagementLinks active={active} />}
            title={translate('Suppliers')}>
            <div className={'flex items-center justify-between'}>
                <h2 className={'text-xl'}>{translate('List of suppliers')}</h2>
                <ProtectedComponent role={'supplier-create-supplier'}>
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
                    editRole={'supplier-edit-supplier'}
                    deleteRole={'supplier-delete-supplier'}
                    fromResource={true}
                    data={suppliers}
                    showNumber={true}
                    handleEditAction={supplier => {
                        setSupplier(supplier)
                        setShowForm(true)
                    }}
                    columns={[
                        {
                            name: translate('Name'),
                            key: 'name',
                            sort: true,
                        },
                        {
                            name: translate('Email'),
                            key: 'email',
                            sort: true,
                        },
                        {
                            name: translate('Phone number'),
                            key: 'phone_number',
                            sort: true,
                        },
                        {
                            name: translate('Province id'),
                            key: 'province.name',
                            sort: true,
                        },
                        {
                            name: translate('Address'),
                            key: 'address',
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
                <SupplierForm
                    provinces={provinces}
                    translate={translate}
                    onClose={() => {
                        setSupplier(null)
                        setShowForm(false)
                    }}
                    supplier={supplier}
                />
            )}
        </Authenticated>
    )
}

export default SupplierIndex
