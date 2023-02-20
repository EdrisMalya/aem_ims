import React from 'react'
import SidebarLinkButton from '@/Components/SidebarLinkButton'
import { CogIcon, UsersIcon } from '@heroicons/react/24/outline'
import { HomeIcon } from '@heroicons/react/24/solid'
import ProtectedComponent from '@/Components/ProtectedComponent'
import { usePage } from '@inertiajs/inertia-react'
import useLanguage from '@/hooks/useLanguage'
import CategoryIcon from '@mui/icons-material/Category'

const SidebarLinks = ({ active }) => {
    const { lang, dir } = usePage().props
    const { translate } = useLanguage()
    return (
        <div className={'mt-5'}>
            <SidebarLinkButton
                dir={dir}
                icon={<HomeIcon className={'h-5'} />}
                url={route('dashboard', { lang })}
                label={translate('Dashboard')}
                active={active === 'dashboard'}
            />
            <ProtectedComponent role={'products-management-access'}>
                <SidebarLinkButton
                    dir={dir}
                    icon={<CategoryIcon className={'h-5'} />}
                    url={route('products-management.index', { lang })}
                    label={translate('Products management')}
                    active={active === 'product-management'}
                />
            </ProtectedComponent>
            <ProtectedComponent role={'user-management-access'}>
                <SidebarLinkButton
                    dir={dir}
                    icon={<UsersIcon className={'h-5'} />}
                    url={route('user-management.index', { lang })}
                    label={translate('User management')}
                    active={active === 'user_management'}
                />
            </ProtectedComponent>

            {/*Other links*/}

            <ProtectedComponent role={'configuration-access'}>
                <SidebarLinkButton
                    dir={dir}
                    icon={<CogIcon className={'h-5'} />}
                    url={route('configuration.index', { lang })}
                    label={translate('Configuration')}
                    active={active === 'configuration'}
                />
            </ProtectedComponent>
        </div>
    )
}

export default SidebarLinks
