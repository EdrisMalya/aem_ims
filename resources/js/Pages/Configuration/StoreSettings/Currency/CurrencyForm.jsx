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

const CurrencyForm = ({ translate, onClose, currency }) => {
    const { lang } = usePage().props

    const handleClose = () => {
        onClose()
    }

    const { post, processing, setData, data, errors, put } = useForm({
        name: currency?.name,
        code: currency?.code,
        symbol: currency?.symbol,
    })

    const handleChange = event => {
        setData(event.target.name, event.target.value)
    }

    const handleSubmit = event => {
        event.preventDefault()
        if (!currency) {
            post(route('currency.store', { lang }), {
                onSuccess: () => {
                    handleClose()
                },
            })
        } else {
            post(
                route('currency.update', {
                    lang,
                    currency: currency.id,
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
                {currency
                    ? translate('Edit currency')
                    : translate('Create currency')}
            </DialogTitle>
            <form onSubmit={handleSubmit}>
                <DialogContent>
                    <DialogContentText className={'grid grid-cols-1 gap-3'}>
                        {/*<ImageSelector
                            selectedImage={currency ? currency.image : null}
                            onSelect={image => setData('image', image)}
                            label={translate('Currency image')}
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
                            value={data.code}
                            error={errors.code}
                            helperText={errors.code}
                            name={'code'}
                            size={'small'}
                            label={translate('Code')}
                            required={true}
                        />
                        <TextField
                            onChange={handleChange}
                            value={data.symbol}
                            error={errors.symbol}
                            helperText={errors.symbol}
                            name={'symbol'}
                            size={'small'}
                            label={translate('Symbol')}
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

export default CurrencyForm
