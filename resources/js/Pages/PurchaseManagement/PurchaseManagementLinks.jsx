import React from 'react'
import { Link, usePage } from '@inertiajs/inertia-react'
import { Button } from '@mui/material'
import ProtectedComponent from '@/Components/ProtectedComponent'
import LocalMallIcon from '@mui/icons-material/LocalMall'
import KeyboardReturnIcon from '@mui/icons-material/KeyboardReturn'

const PurchaseManagementLinks = ({ translate }) => {
    const { active, lang } = usePage().props
    return (
        <>
            <Link href={route('purchase.index', { lang })}>
                <Button
                    endIcon={<LocalMallIcon fontSize={'small'} />}
                    variant={active === 'purchase' ? 'contained' : 'outlined'}>
                    {translate('Purchase')}
                </Button>
            </Link>
            <ProtectedComponent role={'purchase-return-access'}>
                <Link href={route('purchase-return.index', { lang })}>
                    <Button
                        endIcon={<KeyboardReturnIcon />}
                        variant={
                            active === 'purchase-return'
                                ? 'contained'
                                : 'outlined'
                        }>
                        {translate('Purchase return')}
                    </Button>
                </Link>
            </ProtectedComponent>
        </>
    )
}

export default PurchaseManagementLinks
