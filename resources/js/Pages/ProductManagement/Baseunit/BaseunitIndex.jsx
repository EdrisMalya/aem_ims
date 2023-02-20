import React from 'react'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import useLanguage from '@/hooks/useLanguage'
import { Button } from '@mui/material'
import { PlusIcon } from '@heroicons/react/24/solid'
import Datatable from '@/Components/Datatable/Datatable'
import ProtectedComponent from '@/Components/ProtectedComponent'
import BaseunitForm from '@/Pages/ProductManagement/Baseunit/BaseunitForm'
import ProductManagementLinks from '@/Pages/ProductManagement/ProductManagementLinks'

const BaseunitIndex = ({ baseunits }) => {
    const [showForm, setShowForm] = React.useState(false)
    const [baseunit, setBaseunit] = React.useState(false)
    const { translate } = useLanguage()

    return (
        <Authenticated
            active={'product-management'}
            navBarOptions={<ProductManagementLinks translate={translate} />}
            title={translate('Base units')}>
            <div className={'flex items-center justify-between'}>
                <h2 className={'text-xl'}>{translate('List of base units')}</h2>
                <ProtectedComponent role={'base-unit-create-base-uit'}>
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
                    editRole={'base-unit-edit-base-unit'}
                    deleteRole={'base-unit-delete-base-unit'}
                    showNumber={true}
                    fromResource={true}
                    data={baseunits}
                    handleEditAction={baseunit => {
                        setBaseunit(baseunit)
                        setShowForm(true)
                    }}
                    columns={[
                        {
                            name: translate('Name'),
                            key: 'name',
                            sort: true,
                        },
                        {
                            name: translate('Created at'),
                            key: 'created_at',
                            data_type: 'date',
                            format: 'YYYY-MM-DD',
                        },
                    ]}
                />
            </div>
            {showForm && (
                <BaseunitForm
                    translate={translate}
                    onClose={() => {
                        setBaseunit(null)
                        setShowForm(false)
                    }}
                    baseunit={baseunit}
                />
            )}
        </Authenticated>
    )
}

export default BaseunitIndex
