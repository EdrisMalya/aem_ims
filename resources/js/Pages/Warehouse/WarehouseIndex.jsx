import React from 'react'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import useLanguage from '@/hooks/useLanguage'
import { Button } from '@mui/material'
import { PlusIcon } from '@heroicons/react/24/solid'
import Datatable from '@/Components/Datatable/Datatable'
import ProtectedComponent from '@/Components/ProtectedComponent'
import WarehouseForm from '@/Pages/Warehouse/WarehouseForm'
import StoreSettingLayout from '@/Pages/Configuration/StoreSettings/StoreSettingLayout'

const WarehouseIndex = ({ warehouses }) => {
    const [showForm, setShowForm] = React.useState(false)
    const [warehouse, setWarehouse] = React.useState(false)
    const { translate } = useLanguage()

    return (
        <StoreSettingLayout translate={translate}>
            <div className={'flex items-center justify-between'}>
                <h2 className={'text-xl'}>{translate('List of warehouses')}</h2>
                <ProtectedComponent role={'warehouse-create-warehouse'}>
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
                    editRole={'warehouse-edit-warehouse'}
                    deleteRole={'warehouse-delete'}
                    fromResource={true}
                    data={warehouses}
                    handleEditAction={warehouse => {
                        setWarehouse(warehouse)
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
                            name: translate('Address'),
                            key: 'address',
                            sort: true,
                        },
                        {
                            name: translate('Province'),
                            key: 'province.name',
                            sort: true,
                        },
                        {
                            name: translate('Status'),
                            key: 'status',
                            sort: true,
                            data_type: 'boolean',
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
                <WarehouseForm
                    translate={translate}
                    onClose={() => {
                        setWarehouse(null)
                        setShowForm(false)
                    }}
                    warehouse={warehouse}
                />
            )}
        </StoreSettingLayout>
    )
}

export default WarehouseIndex
