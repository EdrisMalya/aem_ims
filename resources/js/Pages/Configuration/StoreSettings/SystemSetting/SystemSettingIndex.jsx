import React from 'react'
import useLanguage from '@/hooks/useLanguage'
import StoreSettingLayout from '@/Pages/Configuration/StoreSettings/StoreSettingLayout'
import ImageSelector from '@/Components/ImageSelector'
import { TextField } from '@mui/material'
import { useForm } from '@inertiajs/inertia-react'
import Select2 from '@/Components/Select2'
import MUISelect from '@/Components/MUISelect'
import { LoadingButton } from '@mui/lab'
import SaveIcon from '@mui/icons-material/Save'

const SystemSettingIndex = ({
    currencies,
    customers,
    province,
    warehouses,
    lang,
    system_setting,
}) => {
    const { translate } = useLanguage()
    const { post, processing, setData, data, errors, put } = useForm({
        logo: system_setting?.data?.logo,
        name: system_setting?.data?.name,
        currency: system_setting
            ? {
                  label: system_setting.data.currency.symbol,
                  value: system_setting.data.currency.id,
              }
            : null,
        phone_number: system_setting?.data?.phone_number,
        province: system_setting
            ? {
                  label: system_setting.data.province.name,
                  value: system_setting.data.province.id,
              }
            : null,
        warehouse: system_setting
            ? {
                  label: system_setting.data.warehouse.name,
                  value: system_setting.data.warehouse.id,
              }
            : null,
        customer: system_setting
            ? {
                  label: system_setting.data.customer.name,
                  value: system_setting.data.customer.id,
              }
            : null,
        address: system_setting?.data?.address,
        date_format: system_setting?.data?.date_format,
    })
    const handleChange = event => {
        setData(event.target.name, event.target.value)
    }

    const handleSubmit = event => {
        event.preventDefault()
        if (system_setting) {
            post(
                route('system-settings.update', {
                    lang,
                    _method: 'PUT',
                    system_setting: system_setting.data.id,
                }),
            )
        } else {
            post(route('system-settings.store', { lang }))
        }
    }

    return (
        <StoreSettingLayout translate={translate}>
            <div>
                <h2 className={'text-xl'}>{translate('System settings')}</h2>
                <form className={'mt-5'} onSubmit={handleSubmit}>
                    <div className={''}>
                        <ImageSelector
                            selectedImage={
                                system_setting ? system_setting.data.logo : null
                            }
                            onSelect={logo => setData('logo', logo)}
                            label={translate('Store logo')}
                        />
                        <div className={'mt-2 grid grid-cols-3 gap-2'}>
                            <TextField
                                onChange={handleChange}
                                value={data.name}
                                error={errors.name}
                                helperText={errors.name}
                                name={'name'}
                                size={'small'}
                                label={translate('Store Name')}
                                required={true}
                            />
                            <TextField
                                onChange={handleChange}
                                value={data.phone_number}
                                error={errors.phone_number}
                                helperText={errors.phone_number}
                                name={'phone_number'}
                                size={'small'}
                                label={translate('Store default phone number')}
                                required={true}
                            />
                            <Select2
                                required={true}
                                data={currencies.data}
                                value={data.currency}
                                onChange={data => setData('currency', data)}
                                label={translate('Default currency')}
                                selectValue={'id'}
                                selectLabel={'symbol'}
                            />
                            <Select2
                                required={true}
                                data={province.data}
                                value={data.province}
                                onChange={data => setData('province', data)}
                                label={translate('Province')}
                                selectValue={'id'}
                                selectLabel={'name'}
                            />
                            <Select2
                                required={true}
                                data={warehouses.data}
                                value={data.warehouse}
                                onChange={data => setData('warehouse', data)}
                                label={translate('Default store warehouse')}
                                selectValue={'id'}
                                selectLabel={'name'}
                            />
                            <Select2
                                required={true}
                                data={customers.data}
                                value={data.customer}
                                onChange={data => setData('customer', data)}
                                label={translate('Default store customer')}
                                selectValue={'id'}
                                selectLabel={'name'}
                            />
                            <TextField
                                className={'col-span-2'}
                                onChange={handleChange}
                                value={data.address}
                                error={errors.address}
                                helperText={errors.address}
                                name={'address'}
                                size={'small'}
                                label={translate('Store address')}
                                required={true}
                            />
                            <MUISelect
                                value={data.date_format}
                                onChange={data =>
                                    setData('date_format', data.target.value)
                                }
                                label={translate('Default date format')}
                                options={[
                                    {
                                        label: 'YYYY-MM-DD',
                                        value: 'Y-m-d',
                                    },
                                    {
                                        label: 'DD-MM-YYYY',
                                        value: 'd-m-Y',
                                    },
                                    {
                                        label: 'MM/DD/YYYY',
                                        value: 'm/d/Y',
                                    },
                                    {
                                        label: 'DD/MM/YYYY',
                                        value: 'd/m/Y',
                                    },
                                    {
                                        label: 'YYYY/MM/DD',
                                        value: 'Y/m/d',
                                    },
                                    {
                                        label: 'MM.DD.YYYY',
                                        value: 'm.d.Y',
                                    },
                                    {
                                        label: 'YYYY.MM.DD',
                                        value: 'Y.m.d',
                                    },
                                ]}
                            />
                            <div>
                                <LoadingButton
                                    type={'submit'}
                                    endIcon={<SaveIcon />}
                                    loading={processing}
                                    variant={'outlined'}>
                                    {translate('Save')}
                                </LoadingButton>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </StoreSettingLayout>
    )
}

export default SystemSettingIndex
