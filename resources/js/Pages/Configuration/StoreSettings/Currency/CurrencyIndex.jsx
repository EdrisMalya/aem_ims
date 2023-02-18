import React from 'react'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import useLanguage from '@/hooks/useLanguage'
import { Button } from '@mui/material'
import { PlusIcon } from '@heroicons/react/24/solid'
import Datatable from '@/Components/Datatable/Datatable'
import ProtectedComponent from '@/Components/ProtectedComponent'
import CurrencyForm from '@/Pages/Configuration/StoreSettings/Currency/CurrencyForm'
import StoreSettingLayout from '@/Pages/Configuration/StoreSettings/StoreSettingLayout'

const CurrencyIndex = ({ currencys }) => {
    const [showForm, setShowForm] = React.useState(false)
    const [currency, setCurrency] = React.useState(false)
    const { translate } = useLanguage()

    return (
        <StoreSettingLayout active={'currency'} title={translate('Currencies')}>
            <div className={'flex items-center justify-between'}>
                <h2 className={'text-xl'}>{translate('List of currencys')}</h2>
                <ProtectedComponent role={'currency-create-currency'}>
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
                    editRole={'currency-edit-currency'}
                    deleteRole={'currency-delete-currency'}
                    fromResource={true}
                    data={currencys}
                    handleEditAction={currency => {
                        setCurrency(currency)
                        setShowForm(true)
                    }}
                    columns={[
                        {
                            name: translate('Name'),
                            key: 'name',
                            sort: true,
                        },
                        {
                            name: translate('Code'),
                            key: 'code',
                            sort: true,
                        },
                        {
                            name: translate('Symbol'),
                            key: 'symbol',
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
                <CurrencyForm
                    translate={translate}
                    onClose={() => {
                        setCurrency(null)
                        setShowForm(false)
                    }}
                    currency={currency}
                />
            )}
        </StoreSettingLayout>
    )
}

export default CurrencyIndex
