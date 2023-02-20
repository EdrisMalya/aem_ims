import React from 'react'
import Authenticated from '@/Layouts/AuthenticatedLayout'
import useLanguage from '@/hooks/useLanguage'
import ProductManagementLinks from '@/Pages/ProductManagement/ProductManagementLinks'
import { useForm } from '@inertiajs/inertia-react'
import { TextField } from '@mui/material'
import ImageSelector from '@/Components/ImageSelector'
import Select2 from '@/Components/Select2'
import MUISelect from '@/Components/MUISelect'
import CostInput from '@/Components/CostInput'

const ProductForm = ({ active, categories, brand }) => {
    const { translate } = useLanguage()
    const handleChange = event => {
        setData(event.target.name, event.target.value)
    }
    const { setData, errors, post, data } = useForm({
        name: null,
    })
    return (
        <Authenticated
            active={'product-management'}
            title={translate('product form')}
            navBarOptions={
                <ProductManagementLinks translate={translate} active={active} />
            }>
            <h2 className={'text-xl'}>
                {translate('Add new product to store')}
            </h2>
            <div
                className={'mt-8 max-w-6xl mx-auto bg-gray-800 shadow-lg p-12'}>
                <div className={'grid grid-cols-3 gap-3'}>
                    <TextField
                        onChange={handleChange}
                        placeholder={translate('Enter Name')}
                        value={data.name}
                        error={errors.name}
                        helperText={errors.name}
                        name={'name'}
                        size={'small'}
                        label={translate('Product name')}
                        required={true}
                    />
                    <TextField
                        onChange={handleChange}
                        placeholder={translate('Enter Code')}
                        value={data.code}
                        error={errors.code}
                        helperText={errors.code}
                        name={'code'}
                        size={'small'}
                        label={translate('Code')}
                        required={true}
                    />
                    <ImageSelector
                        className={'text-xs py-3 dark:hover:bg-gray-600'}
                    />
                    <Select2
                        required={true}
                        data={categories.data}
                        placeholder={translate('Choose Product Category')}
                        selectLabel={'name'}
                        selectValue={'id'}
                        label={translate('Product category')}
                    />
                    <Select2
                        required={true}
                        data={brand.data}
                        placeholder={translate('Choose Product Category')}
                        selectLabel={'name'}
                        selectValue={'id'}
                        label={translate('Product category')}
                    />

                    <MUISelect
                        options={[
                            {
                                label: translate('Code 128'),
                                value: 128,
                            },
                            {
                                label: translate('Code 39'),
                                value: 39,
                            },
                        ]}
                        label={translate('Barcode Symbology')}
                    />
                    <TextField
                        onChange={handleChange}
                        placeholder={translate('Enter Product Cost')}
                        value={data.cost}
                        error={errors.cost}
                        helperText={errors.cost}
                        name={'cost'}
                        size={'small'}
                        label={translate('Product cost')}
                        required={true}
                    />
                    <CostInput label={translate('Product cost')} />
                </div>
            </div>
        </Authenticated>
    )
}

export default ProductForm
