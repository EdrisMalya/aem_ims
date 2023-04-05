import * as React from 'react'
import PropTypes from 'prop-types'
import { IMaskInput } from 'react-imask'
import { NumericFormat } from 'react-number-format'
import TextField from '@mui/material/TextField'
import { usePage } from '@inertiajs/inertia-react'

const TextMaskCustom = React.forwardRef(function TextMaskCustom(props, ref) {
    const { onChange, ...other } = props
    return (
        <IMaskInput
            {...other}
            mask="(#00) 000-0000"
            definitions={{
                '#': /[1-9]/,
            }}
            inputRef={ref}
            onAccept={value =>
                onChange({ target: { name: props.name, value } })
            }
            overwrite
        />
    )
})

TextMaskCustom.propTypes = {
    name: PropTypes.string.isRequired,
    onChange: PropTypes.func.isRequired,
}

const NumericFormatCustom = React.forwardRef(function NumericFormatCustom(
    props,
    ref,
) {
    const { onChange, ...other } = props
    const { system_setting } = usePage().props

    return (
        <NumericFormat
            {...other}
            getInputRef={ref}
            onValueChange={values => {
                onChange({
                    target: {
                        name: props.name,
                        value: values.value,
                    },
                })
            }}
            thousandSeparator
            valueIsNumericString
            prefix={system_setting.data.currency.symbol + ' '}
        />
    )
})

NumericFormatCustom.propTypes = {
    name: PropTypes.string.isRequired,
    onChange: PropTypes.func.isRequired,
}

export default function CostInput({
    value,
    onChange,
    label,
    placeholder = null,
    size = 'small',
    required = false,
    error = null,
}) {
    const handleChange = event => {
        if (onChange) {
            onChange(event.target.value)
        }
    }

    return (
        <TextField
            required={required}
            label={label}
            error={error}
            helperText={error}
            placeholder={placeholder}
            size={size}
            value={value}
            onChange={handleChange}
            InputProps={{
                inputComponent: NumericFormatCustom,
            }}
        />
    )
}
