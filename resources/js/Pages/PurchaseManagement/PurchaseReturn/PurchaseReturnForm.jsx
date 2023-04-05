import React from 'react'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import useLanguage from '@/hooks/useLanguage'
import PurchaseManagementLinks from '@/Pages/PurchaseManagement/PurchaseManagementLinks'
import { LoadingButton } from '@mui/lab'
import { Save } from '@mui/icons-material'
import AsyncSelect2 from '@/Components/AsyncSelect2'

const PurchaseReturnForm = () => {
    const { translate, lang } = useLanguage()
    return (
        <Authenticated
            active={translate('Create purchase return')}
            navBarOptions={<PurchaseManagementLinks translate={translate} />}
            title={translate('Create purchase return')}>
            <h3 className={'text-xl'}>{translate('Create purchase return')}</h3>
            <form>
                <div
                    className={
                        'dark:bg-gray-800 bg-gray-300 p-5 rounded-xl mt-4'
                    }>
                    <div className={'max-w-5xl mx-auto'}>
                        <AsyncSelect2
                            selectedLabel={'reference'}
                            selectedValue={'id'}
                            label={translate('Search purchase reference')}
                            url={route('purchase.index', {
                                lang,
                                fetch_purchase_reference: true,
                            })}
                        />
                    </div>
                </div>
                <div className={'mt-4'}>
                    <LoadingButton endIcon={<Save />} variant={'outlined'}>
                        {translate('Save')}
                    </LoadingButton>
                </div>
            </form>
        </Authenticated>
    )
}

export default PurchaseReturnForm
