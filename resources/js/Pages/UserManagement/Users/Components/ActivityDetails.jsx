import React, { useState } from 'react'
import {
    Button,
    Dialog,
    DialogActions,
    DialogContent,
    DialogContentText,
    DialogTitle,
} from '@mui/material'
import dayjs from 'dayjs'
import LogUpdateEvent from '@/Pages/UserManagement/Users/Components/LogUpdateEvent'
import LogCreatedEvent from '@/Pages/UserManagement/Users/Components/LogCreatedEvent'
import { useRecoilState } from 'recoil'
import { directionAtom } from '@/atoms/directionAtom'
import RestoreIcon from '@mui/icons-material/Restore'
import swal from 'sweetalert'
import { LoadingButton } from '@mui/lab'
import { useForm, usePage } from '@inertiajs/inertia-react'

const ActivityDetails = ({ onClose, translate, data }) => {
    const [open, setOpen] = useState(true)
    const { lang } = usePage().props

    const { post, processing } = useForm({
        data: data,
    })

    const handleClose = () => {
        setOpen(false)
        onClose()
    }

    const handleRestore = () => {
        swal({
            icon: 'info',
            title: translate('Are you sure'),
            buttons: true,
        }).then(res => {
            if (res) {
                post(route('restore.log', { lang }))
            }
        })
    }

    const [dir] = useRecoilState(directionAtom)

    const eventRenderer = event => {
        switch (event) {
            case 'updated':
                return <LogUpdateEvent properties={data?.properties} />
            case 'created':
                return <LogCreatedEvent properties={data?.properties} />
            case 'deleted':
                return (
                    <div>
                        <table className={'table w-full text-center'}>
                            <thead>
                                <tr>
                                    <th>{translate('Field name')}</th>
                                    <th>{translate('Field value')}</th>
                                </tr>
                            </thead>
                            <tbody>
                                {Object.keys(data?.properties?.old).map(
                                    (item, index) => (
                                        <tr key={index}>
                                            <td>
                                                {translate(
                                                    item.replaceAll('_', ' '),
                                                )}
                                            </td>
                                            <td>
                                                {data?.properties?.old[item]}
                                            </td>
                                        </tr>
                                    ),
                                )}
                            </tbody>
                        </table>
                    </div>
                )
        }
    }

    return (
        <Dialog open={open} dir={dir}>
            <DialogTitle>{translate('Activity details')}</DialogTitle>
            <DialogContent>
                <DialogContentText>
                    <div className={'mt-5 flex flex-col space-y-1'}>
                        <p className={'text-sm'}>
                            {translate('Action type')}:{' '}
                            <b>{translate(data?.event)}</b>
                        </p>
                        <p className={'text-sm'}>
                            {translate('Effected on')}:{' '}
                            <b>{translate(data?.log_name)}</b>
                        </p>
                        <p className={'text-sm'}>
                            {translate('Date')}:{' '}
                            <b>
                                {dayjs(data?.created_at).format(
                                    'YYYY-MM-DD H:m A',
                                )}
                            </b>
                        </p>
                        <br />
                        {eventRenderer(data?.event)}
                    </div>
                </DialogContentText>
            </DialogContent>
            <DialogActions>
                <Button color={'error'} onClick={handleClose}>
                    {translate('Close')}
                </Button>
                {data?.event === 'deleted' && (
                    <LoadingButton
                        loading={processing}
                        color={'success'}
                        endIcon={<RestoreIcon />}
                        onClick={handleRestore}>
                        {translate('Restore')}
                    </LoadingButton>
                )}
            </DialogActions>
        </Dialog>
    )
}

export default ActivityDetails
