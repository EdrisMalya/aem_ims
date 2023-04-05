import React from 'react'
import BrandForm from '@/Pages/ProductManagement/Brand/BrandForm'
import ProductCategoryForm from '@/Pages/ProductManagement/ProductCategory/ProductCategoryForm'
import BaseunitForm from '@/Pages/ProductManagement/Baseunit/BaseunitForm'
import WarehouseForm from '@/Pages/Warehouse/WarehouseForm'
import SupplierForm from '@/Pages/Supplier/SupplierForm'

const ItemCreationForm = ({ translate, options, setOptions }) => {
    const renderForm = () => {
        switch (options.module) {
            case 'product-brand':
                return (
                    <BrandForm
                        translate={translate}
                        defaultValue={options?.value}
                        onClose={() => {
                            setOptions({
                                show: false,
                                module: false,
                            })
                        }}
                    />
                )
            case 'product-category':
                return (
                    <ProductCategoryForm
                        translate={translate}
                        defaultValue={options?.value}
                        onClose={() => {
                            setOptions({
                                show: false,
                                module: false,
                            })
                        }}
                    />
                )
            case 'product-unit':
                return (
                    <BaseunitForm
                        translate={translate}
                        defaultValue={options?.value}
                        onClose={() => {
                            setOptions({
                                show: false,
                                module: false,
                            })
                        }}
                    />
                )
            case 'warehouse':
                return (
                    <WarehouseForm
                        translate={translate}
                        defaultValue={options?.value}
                        onClose={() => {
                            setOptions({
                                show: false,
                                module: false,
                            })
                        }}
                    />
                )
            case 'supplier':
                return (
                    <SupplierForm
                        translate={translate}
                        defaultValue={options?.value}
                        onClose={() => {
                            setOptions({
                                show: false,
                                module: false,
                            })
                        }}
                    />
                )
        }
    }
    return options.show && renderForm()
}

export default ItemCreationForm
