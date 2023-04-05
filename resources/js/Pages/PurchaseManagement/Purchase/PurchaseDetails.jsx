import React, { useRef } from 'react'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import useLanguage from '@/hooks/useLanguage'
import PurchaseManagementLinks from '@/Pages/PurchaseManagement/PurchaseManagementLinks'
import { Print } from '@mui/icons-material'
import ReactToPrint from 'react-to-print'
import { IconButton } from '@mui/material'
import PurchaseDetailsComponent from '@/Pages/PurchaseManagement/Purchase/PurchaseDetailsComponent'

const PurchaseDetails = ({ purchase }) => {
    const { translate } = useLanguage()
    const componentRef = useRef()

    return (
        <Authenticated
            active={'purchase-management'}
            title={translate('Purchase management')}
            navBarOptions={<PurchaseManagementLinks translate={translate} />}>
            <h3 className={'text-xl '}>{translate('Purchase Details')}</h3>
            <div className={'p-5 dark:bg-gray-800 mt-5 bg-gray-300 rounded'}>
                <ReactToPrint
                    trigger={() => {
                        return (
                            <IconButton color={'primary'}>
                                <Print />
                            </IconButton>
                        )
                    }}
                    content={() => componentRef.current}
                />
                <PurchaseDetailsComponent
                    translate={translate}
                    purchase={purchase}
                    ref={componentRef}
                />
            </div>
        </Authenticated>
    )
}

export default PurchaseDetails
