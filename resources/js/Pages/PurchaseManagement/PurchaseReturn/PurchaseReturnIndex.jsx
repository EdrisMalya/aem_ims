import React from 'react'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import useLanguage from '@/hooks/useLanguage'
import PurchaseManagementLinks from '@/Pages/PurchaseManagement/PurchaseManagementLinks'
import { Button } from '@mui/material'
import { PlusIcon } from '@heroicons/react/20/solid'
import ProtectedComponent from '@/Components/ProtectedComponent'
import { Link } from '@inertiajs/inertia-react'

const PurchaseReturnIndex = () => {
    const { translate, lang } = useLanguage()
    return (
        <Authenticated
            title={translate('Purchase return')}
            navBarOptions={<PurchaseManagementLinks translate={translate} />}>
            <div className={'flex items-center justify-between'}>
                <h3 className={'text-xl'}>
                    {translate('Purchase return list')}
                </h3>
                <ProtectedComponent
                    role={'purchase-return-create-purchase-return'}>
                    <Link href={route('purchase-return.create', { lang })}>
                        <Button
                            variant={'outlined'}
                            endIcon={<PlusIcon className={'h-4'} />}>
                            {translate('Create purchase return')}
                        </Button>
                    </Link>
                </ProtectedComponent>
            </div>
        </Authenticated>
    )
}

export default PurchaseReturnIndex
