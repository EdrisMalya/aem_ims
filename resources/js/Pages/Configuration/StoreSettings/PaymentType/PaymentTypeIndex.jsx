import React from 'react'
import StoreSettingLayout from '@/Pages/Configuration/StoreSettings/StoreSettingLayout'
import useLanguage from '@/hooks/useLanguage'
import ProtectedComponent from '@/Components/ProtectedComponent'
import { Button, Chip } from '@mui/material'
import { PlusIcon } from '@heroicons/react/24/solid'
import PaymentTypeForm from '@/Pages/Configuration/StoreSettings/PaymentType/PaymentTypeForm'
import { useRecoilState } from 'recoil'
import { fullPageLoading } from '@/atoms/fullPageLoading'
import swal from 'sweetalert'
import { useForm } from '@inertiajs/inertia-react'

const PaymentTypeIndex = ({ payment_types, lang }) => {
    const [form, setForm] = React.useState(false)
    const { translate } = useLanguage()
    const loading = useRecoilState(fullPageLoading)
    const { delete: destroy } = useForm()

    const handleDelete = id => {
        swal({
            icon: 'warning',
            title: translate('Are you sure you want to delete'),
            buttons: true,
        }).then(res => {
            if (res) {
                loading[1](true)
                destroy(
                    route('payment-type.destroy', { payment_type: id, lang }),
                    {
                        onSuccess: () => {
                            loading[1](false)
                        },
                    },
                )
            }
        })
    }

    return (
        <StoreSettingLayout translate={translate}>
            <div className={'flex items-center justify-between'}>
                <h3 className={'text-xl'}>
                    {translate('List of payment types')}
                </h3>
                <ProtectedComponent role={'payment-types-create'}>
                    <Button
                        onClick={() => setForm(true)}
                        variant={'outlined'}
                        endIcon={<PlusIcon className={'h-4'} />}>
                        {translate('Add new payment type')}
                    </Button>
                </ProtectedComponent>
            </div>
            <div className={'mt-5'}>
                {payment_types.data.length < 1 ? (
                    <p className={'text-center text-red-500 py-12'}>
                        {translate('No record found')}
                    </p>
                ) : (
                    <div>
                        {payment_types.data.map(payment_type => (
                            <Chip
                                className={'!m-1'}
                                label={payment_type.name}
                                key={payment_type.id}
                                variant={'outlined'}
                                onDelete={() => {
                                    handleDelete(payment_type.id)
                                }}
                            />
                        ))}
                    </div>
                )}
            </div>
            {form && (
                <PaymentTypeForm
                    translate={translate}
                    onClose={() => {
                        setForm(false)
                    }}
                />
            )}
        </StoreSettingLayout>
    )
}

export default PaymentTypeIndex
