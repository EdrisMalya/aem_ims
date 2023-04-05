import React from 'react'
import ProtectedComponent from '@/Components/ProtectedComponent'
import { Link, usePage } from '@inertiajs/inertia-react'
import { Button } from '@mui/material'
import CategoryIcon from '@mui/icons-material/Category'
import StraightenIcon from '@mui/icons-material/Straighten'
import StoreIcon from '@mui/icons-material/Store'
import ClearAllIcon from '@mui/icons-material/ClearAll'
import QrCode2Icon from '@mui/icons-material/QrCode2'

const ProductManagementLinks = ({ translate }) => {
    const { active, lang } = usePage().props

    const activeLink = () => {
        switch (active) {
            case 'products':
                return 'products'
            case 'base-unit':
                return 'base-unit'
            case 'product-categories':
                return 'product-categories'
            case 'brands':
                return 'brands'
            case 'print-barcode':
                return 'print-barcode'
        }
    }

    return (
        <>
            <ProtectedComponent role={'product-access'}>
                <Link href={route('product.index', { lang })}>
                    <Button
                        endIcon={<CategoryIcon fontSize={'small'} />}
                        variant={
                            activeLink() === 'products'
                                ? 'contained'
                                : 'outlined'
                        }>
                        {translate('Products')}
                    </Button>
                </Link>
            </ProtectedComponent>
            <ProtectedComponent role={'product-categories-access'}>
                <Link href={route('productcategory.index', { lang })}>
                    <Button
                        endIcon={<ClearAllIcon fontSize={'small'} />}
                        variant={
                            activeLink() === 'product-categories'
                                ? 'contained'
                                : 'outlined'
                        }>
                        {translate('Product categories')}
                    </Button>
                </Link>
            </ProtectedComponent>
            <ProtectedComponent role={'base-unit-access'}>
                <Link href={route('brand.index', { lang })}>
                    <Button
                        endIcon={<StoreIcon fontSize={'small'} />}
                        variant={
                            activeLink() === 'brands' ? 'contained' : 'outlined'
                        }>
                        {translate('Brands')}
                    </Button>
                </Link>
            </ProtectedComponent>
            <ProtectedComponent role={'base-unit-access'}>
                <Link href={route('baseunit.index', { lang })}>
                    <Button
                        endIcon={<StraightenIcon fontSize={'small'} />}
                        variant={
                            activeLink() === 'base-unit'
                                ? 'contained'
                                : 'outlined'
                        }>
                        {translate('Base units')}
                    </Button>
                </Link>
            </ProtectedComponent>
            <ProtectedComponent role={'print-barcode-access'}>
                <Link href={route('barcode-printer.index', { lang })}>
                    <Button
                        endIcon={<QrCode2Icon fontSize={'small'} />}
                        variant={
                            activeLink() === 'print-barcode'
                                ? 'contained'
                                : 'outlined'
                        }>
                        {translate('Print barcode')}
                    </Button>
                </Link>
            </ProtectedComponent>
        </>
    )
}

export default ProductManagementLinks
