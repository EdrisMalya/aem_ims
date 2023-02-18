import React from 'react'
import useLanguage from '@/hooks/useLanguage'
import StoreSettingLayout from '@/Pages/Configuration/StoreSettings/StoreSettingLayout'
import StoreSettingLinks from '@/Pages/Configuration/StoreSettings/StoreSettingLinks'

const StoreSettingIndex = ({ active_module, lang }) => {
    const { translate } = useLanguage()
    return (
        <StoreSettingLayout translate={translate}>
            <div className={'grid grid-cols-12'}>
                <div className={'col-span-3'}>
                    <StoreSettingLinks active={active_module} lang={lang} />
                </div>
            </div>
        </StoreSettingLayout>
    )
}

export default StoreSettingIndex
