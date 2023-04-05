import * as React from 'react'
import TextField from '@mui/material/TextField'
import Autocomplete from '@mui/material/Autocomplete'
import CircularProgress from '@mui/material/CircularProgress'
import { debounce } from 'lodash'

export default function AsyncSelect2({
    url,
    label,
    selectedLabel,
    selectedValue,
    multiple = false,
    onChange,
    fromResource = true,
}) {
    const [open, setOpen] = React.useState(false)
    const [options, setOptions] = React.useState([])
    const [loading, setLoading] = React.useState(false)

    const resolve = (path, obj) => {
        return path.split('.').reduce(function (prev, curr) {
            return prev ? prev[curr] : null
        }, obj || self)
    }

    const fetchOptions = value => {
        setLoading(true)
        axios
            .get(url + '&search=' + value)
            .then(res => {
                let data = fromResource ? res.data.data : res.data
                let options = data.map(option => {
                    return {
                        label: resolve(selectedLabel, option),
                        value: resolve(selectedValue, option),
                    }
                })
                setOptions(options)
            })
            .catch(err => setOptions([]))
            .finally(() => setLoading(false))
        /*
        try {
            const response = await fetch(
                `http://example.com/api/search?q=${query}`,
            )
            const data = await response.json()
            setOptions(data.results)
        } catch (error) {
            console.error(error)
            setOptions([])
        } finally {
            setLoading(false)
        }*/
    }

    return (
        <Autocomplete
            id="asynchronous-demo"
            fullWidth={true}
            size={'small'}
            open={open}
            onOpen={() => {
                setOpen(true)
            }}
            onClose={() => {
                setOpen(false)
            }}
            filterOptions={x => x}
            getOptionLabel={option => option.label}
            multiple={multiple}
            options={options}
            loading={loading}
            isOptionEqualToValue={(option, value) =>
                option.label === value.label
            }
            onInputChange={(event, value, reason) => {
                if (reason === 'input') {
                    fetchOptions(value)
                }
            }}
            onChange={(event, data) => onChange(data)}
            renderInput={params => (
                <TextField
                    {...params}
                    label={label}
                    InputProps={{
                        ...params.InputProps,
                        endAdornment: (
                            <React.Fragment>
                                {loading ? (
                                    <CircularProgress
                                        color="inherit"
                                        size={20}
                                    />
                                ) : null}
                                {params.InputProps.endAdornment}
                            </React.Fragment>
                        ),
                    }}
                />
            )}
        />
    )
}
