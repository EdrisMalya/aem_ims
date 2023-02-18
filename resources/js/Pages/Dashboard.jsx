import React, { useEffect } from 'react'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout'
import { Head } from '@inertiajs/inertia-react'
import useLanguage from '@/hooks/useLanguage'
import { Button } from '@mui/material'
import { Inertia } from '@inertiajs/inertia'
import SortableList from '@/Components/SortableList'
import LineChart from '@/Components/LineChart'
import PieChart from '@/Components/PieChart'
import Table from '@/Components/Table'

export default function Dashboard(props) {
    const { translate } = useLanguage()
    useEffect(() => {
        window.Echo.private('testchannel')
            .listen('Test', e => {
                console.log(e)
            })
            .subscribe()
    }, [])

    return (
        <AuthenticatedLayout
            active={'dashboard'}
            auth={props.auth}
            errors={props.errors}>
            <Head title="Dashboard" />
            {/*<Button
                onClick={() => {
                    Inertia.get(route('first.test.event', { lang: props.lang }))
                }}>
                Fire event
            </Button>*/}
            {/*<div className=" h-screen flex justify-center items-center">
                <div className=" shadow-md rounded p-8">
                    <h1 className="text-2xl font-bold text-primary">
                        {translate('Welcome to the Dashboard')}
                    </h1>
                </div>
            </div>*/}
            <div className={'grid grid-cols-6 gap-3'}>
                {[1, 2, 3, 4, 5, 6]?.map(number => (
                    <div
                        className={
                            'p-8 text-center dark:bg-gray-800 shadow-lg rounded-xl text-xl'
                        }>
                        Box {number}
                    </div>
                ))}
            </div>
            <div className={'mt-4 grid grid-cols-12 gap-4'}>
                <div
                    className={
                        'col-span-8 bg-gray-800 p-6 shadow-xl rounded-xl'
                    }>
                    <h2 className={'text-xl'}>{translate('Graph 1')}</h2>
                    <LineChart />
                    {/*<LineChart />*/}
                </div>
                <div
                    className={
                        'col-span-4 bg-gray-800 p-6 shadow-xl rounded-xl'
                    }>
                    <h2 className={'text-xl'}>{translate('Graph 2')}</h2>
                    <PieChart />
                </div>
            </div>
            <div className={'mt-4'}>
                <Table />
            </div>
        </AuthenticatedLayout>
    )
}
