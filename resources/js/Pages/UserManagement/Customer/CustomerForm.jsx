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

const CustomerForm = ({ translate, onClose, customer }) => {
    const { lang } = usePage().props

    const handleClose = () => {
        onClose()
    }

    const { post, processing, setData, data, errors, put } = useForm({
        name: customer?.name,
        phone_number: customer?.phone_number,
        email: customer?.email,
        address: customer?.address,
    })

    const handleChange = event => {
        setData(event.target.name, event.target.value)
    }

    const handleSubmit = event => {
        event.preventDefault()
        if (!customer) {
            post(route('customer.store', { lang }), {
                onSuccess: () => {
                    handleClose()
                },
            })
        } else {
            post(
                route('customer.update', {
                    lang,
                    customer: customer.id,
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

    return (
        <Dialog open={true} maxWidth={'sm'} fullWidth={true}>
            <DialogTitle>
                {customer
                    ? translate('Edit customer')
                    : translate('Create customer')}
            </DialogTitle>
            <form onSubmit={handleSubmit}>
                <DialogContent>
                    <DialogContentText className={'grid grid-cols-1 gap-3'}>
                        {/*<ImageSelector
                            selectedImage={customer ? customer.image : null}
                            onSelect={image => setData('image', image)}
                            label={translate('Customer image')}
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
                            value={data.phone_number}
                            error={errors.phone_number}
                            helperText={errors.phone_number}
                            name={'phone_number'}
                            size={'small'}
                            label={translate('Phone number')}
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

export default CustomerForm
