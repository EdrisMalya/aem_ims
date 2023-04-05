import * as React from 'react'

import TextField from '@mui/material/TextField'
import { AdapterDayjs } from '@mui/x-date-pickers/AdapterDayjs'
import { LocalizationProvider } from '@mui/x-date-pickers/LocalizationProvider'
import { DatePicker } from '@mui/x-date-pickers/DatePicker'
import dayjs from 'dayjs'

export default function BasicDatePicker({
    value,
    onChange,
    label = null,
    format = 'YYYY/MM/DD',
    size = 'small',
    returnFormat = null,
    fullWidth = true,
    disabled = false,
}) {
    const [dateValue, setDateValue] = React.useState(value)

    return (
        <LocalizationProvider dateAdapter={AdapterDayjs}>
            <DatePicker
                disabled={disabled}
                fullWidth={fullWidth}
                className={'w-full lg:w-auto'}
                label={label}
                value={dateValue}
                inputFormat={format}
                onChange={newValue => {
                    setDateValue(newValue)
                    onChange(
                        dayjs(newValue).format(
                            returnFormat === null ? format : returnFormat,
                        ),
                    )
                }}
                renderInput={params => (
                    <TextField fullWidth={fullWidth} size={size} {...params} />
                )}
            />
        </LocalizationProvider>
    )
}
