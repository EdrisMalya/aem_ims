import React from 'react'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import useLanguage from '@/hooks/useLanguage'
import { Button } from '@mui/material'
import { PlusIcon } from '@heroicons/react/24/solid'
import Datatable from '@/Components/Datatable/Datatable'
import ProtectedComponent from '@/Components/ProtectedComponent'
import CustomerForm from '@/Pages/UserManagement/Customer/CustomerForm'
import UserManagementLinks from '@/Pages/UserManagement/UserManagementLinks'

const CustomerIndex = ({ customers, active }) => {
    const [showForm, setShowForm] = React.useState(false)
    const [customer, setCustomer] = React.useState(false)
    const { translate } = useLanguage()

    return (
        <Authenticated
            active={'user_management'}
            navBarOptions={<UserManagementLinks active={active} />}
            title={translate('Customers')}>
            <div className={'flex items-center justify-between'}>
                <h2 className={'text-xl'}>{translate('List of customers')}</h2>
                <ProtectedComponent role={'customer-create-customer'}>
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
                    editRole={'customers-edit-customer'}
                    deleteRole={'customers-delete-customer'}
                    fromResource={true}
                    data={customers}
                    handleEditAction={customer => {
                        setCustomer(customer)
                        setShowForm(true)
                    }}
                    columns={[
                        {
                            name: translate('Name'),
                            key: 'name',
                            sort: true,
                        },
                        {
                            name: translate('Phone number'),
                            key: 'phone_number',
                            sort: true,
                        },
                        {
                            name: translate('Email'),
                            key: 'email',
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
                <CustomerForm
                    translate={translate}
                    onClose={() => {
                        setCustomer(null)
                        setShowForm(false)
                    }}
                    customer={customer}
                />
            )}
        </Authenticated>
    )
}

export default CustomerIndex
