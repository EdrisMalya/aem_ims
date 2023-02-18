import React from 'react'
import ProtectedComponent from '@/Components/ProtectedComponent'
import { Link, usePage } from '@inertiajs/inertia-react'
import { Button } from '@mui/material'
import CategoryIcon from '@mui/icons-material/Category'

const ProductManagementLinks = ({ translate }) => {
    const { active, lang } = usePage().props

    const activeLink = () => {
        switch (active) {
            case 'products':
                return 'products'
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
        </>
    )
}

export default ProductManagementLinks
