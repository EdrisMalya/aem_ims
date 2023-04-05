import React from 'react'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import useLanguage from '@/hooks/useLanguage'
import PurchaseManagementLinks from '@/Pages/PurchaseManagement/PurchaseManagementLinks'
import ProtectedComponent from '@/Components/ProtectedComponent'
import { Button, IconButton } from '@mui/material'
import { PlusIcon } from '@heroicons/react/24/solid'
import { Link, useForm } from '@inertiajs/inertia-react'
import Datatable from '@/Components/Datatable/Datatable'
import MoreVertIcon from '@mui/icons-material/MoreVert'
import { EyeIcon } from '@heroicons/react/20/solid'
import { Delete, Download, Edit, FilterAlt } from '@mui/icons-material'
import { Inertia } from '@inertiajs/inertia'
import swal from 'sweetalert'
import { useRecoilState } from 'recoil'
import { fullPageLoading } from '@/atoms/fullPageLoading'
import PurchaseFilterModel from '@/Pages/PurchaseManagement/Purchase/PurchaseFilterModel'
import AsyncSelect2 from '@/Components/AsyncSelect2'

const PurchaseIndex = ({ lang, purchases, filters }) => {
    const [filter, setFilter] = React.useState(false)
    const { translate } = useLanguage()
    const { delete: destroy } = useForm()
    const loading = useRecoilState(fullPageLoading)

    const handleDeletePurchase = purchase => {
        swal({
            icon: 'warning',
            title: translate('Are you sure you want to delete'),
            buttons: true,
        }).then(res => {
            if (res) {
                loading[1](true)
                destroy(
                    route('purchase.destroy', { purchase: purchase.id, lang }),
                    {
                        onFinish: () => {
                            loading[1](false)
                        },
                    },
                )
            }
        })
    }

    return (
        <Authenticated
            active={'purchase-management'}
            title={translate('Purchases')}
            navBarOptions={<PurchaseManagementLinks translate={translate} />}>
            <div className={'flex items-center justify-between'}>
                <h2 className={'text-xl'}>
                    {translate('Purchase management')}
                </h2>
                <ProtectedComponent role={'purchase-create-purchase'}>
                    <Link href={route('purchase.create', { lang })}>
                        <Button
                            variant={'outlined'}
                            endIcon={<PlusIcon className={'h-4'} />}>
                            {translate('Create purchase')}
                        </Button>
                    </Link>
                </ProtectedComponent>
            </div>

            <div className={'mt-5 '}>
                <Datatable
                    data={purchases}
                    fromResource={true}
                    datatableFilters={[
                        {
                            element: (
                                <Button
                                    variant={'outlined'}
                                    onClick={() => setFilter(true)}
                                    endIcon={<FilterAlt />}>
                                    Filter
                                </Button>
                            ),
                        },
                    ]}
                    otherOptions={[
                        {
                            icon: <MoreVertIcon />,
                            role: 'purchase-view-details',
                            tooltip: translate('Actions'),
                            menu: [
                                {
                                    icon: (
                                        <EyeIcon
                                            className={'h-5 text-blue-500'}
                                        />
                                    ),
                                    label: translate('View Purchase'),
                                    onClick: data => {
                                        Inertia.get(
                                            route('purchase.show', {
                                                lang,
                                                purchase: data.id,
                                            }),
                                        )
                                    },
                                },
                                {
                                    icon: <Download color={'primary'} />,
                                    label: translate('Download PDF'),
                                    onClick: data => {
                                        console.log(data)
                                    },
                                },
                                {
                                    icon: <Edit color={'warning'} />,
                                    label: translate('Edit Purchase'),
                                    onClick: data => {
                                        Inertia.get(
                                            route('purchase.edit', {
                                                lang,
                                                purchase: data.id,
                                            }),
                                        )
                                    },
                                },
                                {
                                    icon: <Delete color={'error'} />,
                                    label: translate('Delete purchase'),
                                    onClick: purchase => {
                                        handleDeletePurchase(purchase)
                                    },
                                },
                            ],
                        },
                    ]}
                    columns={[
                        {
                            name: 'Reference',
                            key: 'reference',
                            sort: true,
                        },
                        {
                            name: 'Supplier',
                            key: 'supplier.name',
                            sort: true,
                        },
                        {
                            name: 'Warehouse',
                            key: 'warehouse.name',
                            sort: true,
                        },
                        {
                            name: 'Status',
                            key: 'status',
                            sort: true,
                            className: 'bg-green-500 p-1 rounded-lg text-white',
                        },
                        {
                            name: 'Grand total',
                            key: 'grand_total',
                            sort: true,
                        },
                        {
                            name: 'Due amount',
                            key: 'due',
                            sort: true,
                        },
                        {
                            name: 'Purchased on',
                            key: 'purchased_on',
                            sort: true,
                        },
                    ]}
                />
            </div>
            {filter && (
                <PurchaseFilterModel
                    item={filters}
                    translate={translate}
                    onClose={() => {
                        setFilter(false)
                    }}
                />
            )}
        </Authenticated>
    )
}

export default PurchaseIndex
