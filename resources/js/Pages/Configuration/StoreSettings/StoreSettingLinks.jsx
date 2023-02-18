import React from 'react'
import ButtonGroup from '@mui/material/ButtonGroup'
import { Button } from '@mui/material'
import useLanguage from '@/hooks/useLanguage'
import SettingsIcon from '@mui/icons-material/Settings'
import ProtectedComponent from '@/Components/ProtectedComponent'
import AttachMoneyIcon from '@mui/icons-material/AttachMoney'
import { Link } from '@inertiajs/inertia-react'
import StorefrontIcon from '@mui/icons-material/Storefront'

const StoreSettingLinks = ({ active, lang }) => {
    const { translate } = useLanguage()
    return (
        <ButtonGroup orientation={'vertical'} fullWidth={true}>
            <Link href={route('system-settings.index', { lang })}>
                <Button
                    startIcon={<SettingsIcon />}
                    variant={
                        active === 'system-settings' ? 'contained' : 'outlined'
                    }>
                    {translate('System settings')}
                </Button>
            </Link>
            <ProtectedComponent role={'currency-access'}>
                <Link href={route('currency.index', { lang })}>
                    <Button
                        startIcon={<AttachMoneyIcon />}
                        n
                        variant={
                            active === 'currencies' ? 'contained' : 'outlined'
                        }>
                        {translate('Currencies')}
                    </Button>
                </Link>
            </ProtectedComponent>
            <ProtectedComponent role={'currency-access'}>
                <Link href={route('warehouse.index', { lang })}>
                    <Button
                        startIcon={<StorefrontIcon />}
                        n
                        variant={
                            active === 'warehouse' ? 'contained' : 'outlined'
                        }>
                        {translate('Warehouse')}
                    </Button>
                </Link>
            </ProtectedComponent>
        </ButtonGroup>
    )
}

export default StoreSettingLinks
