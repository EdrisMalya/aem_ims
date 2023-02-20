import React from 'react'
import {
    Button,
    Dialog,
    DialogActions,
    DialogContent,
    DialogContentText,
    DialogTitle,
    TextField,
} from '@mui/material'
import { LoadingButton } from '@mui/lab'
import SaveIcon from '@mui/icons-material/Save'
import CloseIcon from '@mui/icons-material/Close'
import { useForm, usePage } from '@inertiajs/inertia-react'
import ImageSelector from '@/Components/ImageSelector'
import { Inertia } from '@inertiajs/inertia'
import Select2 from '@/Components/Select2'

const SupplierForm = ({ translate, onClose, supplier, provinces }) => {
    const { lang } = usePage().props

    const handleClose = () => {
        onClose()
    }

    const { post, processing, setData, data, errors, put } = useForm({
        name: supplier?.name,
        email: supplier?.email,
        phone_number: supplier?.phone_number,
        province_id: supplier
            ? {
                  label: supplier?.province?.name,
                  value: supplier?.province?.id,
              }
            : null,
        address: supplier?.address,
    })

    const handleChange = event => {
        setData(event.target.name, event.target.value)
    }

    const handleSubmit = event => {
        event.preventDefault()
        if (!supplier) {
            post(route('supplier.store', { lang }), {
                onSuccess: () => {
                    handleClose()
                },
            })
        } else {
            post(
                route('supplier.update', {
                    lang,
                    supplier: supplier.id,
                    _method: 'PUT',
                }),
                {
                    onSuccess: () => {
                        handleClose()
                    },
                },
            )
        }
    }

    React.useEffect(() => {
        if (typeof provinces === 'undefined') {
            Inertia.reload({
                only: ['provinces'],
            })
        }
    }, [provinces])

    return (
        <Dialog open={true} maxWidth={'sm'} fullWidth={true}>
            <DialogTitle>
                {supplier
                    ? translate('Edit supplier')
                    : translate('Create supplier')}
            </DialogTitle>
            <form onSubmit={handleSubmit}>
                <DialogContent>
                    <DialogContentText className={'grid grid-cols-1 gap-3'}>
                        {/*<ImageSelector
                            selectedImage={supplier ? supplier.image : null}
                            onSelect={image => setData('image', image)}
                            label={translate('Supplier image')}
                        />*/}
                        <TextField
                            onChange={handleChange}
                            value={data.name}
                            error={errors.name}
                            helperText={errors.name}
                            name={'name'}
                            size={'small'}
                            label={translate('Name')}
                            required={true}
                        />
                        <TextField
                            onChange={handleChange}
                            value={data.email}
                            error={errors.email}
                            helperText={errors.email}
                            name={'email'}
                            size={'small'}
                            label={translate('Email')}
                        />
                        <TextField
                            onChange={handleChange}
                            value={data.phone_number}
                            error={errors.phone_number}
                            helperText={errors.phone_number}
                            name={'phone_number'}
                            size={'small'}
                            label={translate('Phone number')}
                            required={true}
                        />
                        <Select2
                            data={provinces}
                            value={data.province_id}
                            selectValue={'id'}
                            onChange={data => {
                                setData('province_id', data)
                            }}
                            selectLabel={'name'}
                            label={translate('Province')}
                        />
                        <TextField
                            onChange={handleChange}
                            value={data.address}
                            error={errors.address}
                            helperText={errors.address}
                            name={'address'}
                            size={'small'}
                            label={translate('Address')}
                            required={true}
                        />
                    </DialogContentText>
                </DialogContent>
                <DialogActions>
                    <LoadingButton
                        color={'success'}
                        type={'submit'}
                        variant={'outlined'}
                        loading={processing}
                        endIcon={<SaveIcon />}>
                        {translate('Save')}
                    </LoadingButton>
                    <Button
                        type={'button'}
                        endIcon={<CloseIcon />}
                        color={'error'}
                        onClick={handleClose}
                        variant={'outlined'}>
                        {translate('Close')}
                    </Button>
                </DialogActions>
            </form>
        </Dialog>
    )
}

export default SupplierForm
