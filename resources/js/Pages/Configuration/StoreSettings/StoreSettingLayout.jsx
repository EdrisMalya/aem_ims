import React from 'react'
import ConfigurationPageLinks from '@/Pages/Configuration/ConfigurationPageLinks'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import { usePage } from '@inertiajs/inertia-react'
import StoreSettingLinks from '@/Pages/Configuration/StoreSettings/StoreSettingLinks'

const StoreSettingLayout = ({ translate, children }) => {
    const { active, lang, active_module } = usePage().props
    return (
        <Authenticated
            active={'configuration'}
            title={'Configuration page'}
            navBarOptions={
                <ConfigurationPageLinks active={active} lang={lang} />
            }>
            <div className={'grid grid-cols-12 gap-3'}>
                <div className={'col-span-3'}>
                    <StoreSettingLinks active={active_module} lang={lang} />
                </div>
                <div className={'col-span-9'}>{children}</div>
            </div>
        </Authenticated>
    )
}

export default StoreSettingLayout
