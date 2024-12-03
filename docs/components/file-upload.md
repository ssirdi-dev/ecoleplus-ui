# File Upload Component

The File Upload component provides a modern drag-and-drop file upload interface with preview, progress, and validation features.

## Basic Usage

```blade
<x-eplus::file-upload
    name="document"
    label="Upload Document"
/>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | string | required | Input name attribute |
| `id` | string\|null | `null` | Input ID (defaults to name) |
| `label` | string\|null | `null` | Label text |
| `hint` | string\|null | `null` | Help text below the input |
| `error` | string\|null | `null` | Error message |
| `accept` | string\|null | `null` | Allowed file types |
| `multiple` | boolean | `false` | Allow multiple file selection |
| `maxSize` | number\|null | `null` | Maximum file size in MB |
| `preview` | boolean | `true` | Show file preview list |
| `progress` | boolean | `false` | Show upload progress bar |

## Examples

### Basic File Upload

```blade
<x-eplus::file-upload
    name="avatar"
    label="Profile Picture"
    accept="image/*"
    hint="Choose a profile picture to upload"
/>
```

### Multiple Files with Size Limit

```blade
<x-eplus::file-upload
    name="documents[]"
    label="Upload Documents"
    :multiple="true"
    :maxSize="5"
    accept=".pdf,.doc,.docx"
/>
```

### With Progress Bar

```blade
<x-eplus::file-upload
    name="large-file"
    label="Upload Large File"
    :progress="true"
    :maxSize="50"
/>
```

### Without Preview

```blade
<x-eplus::file-upload
    name="quick-upload"
    label="Quick Upload"
    :preview="false"
/>
```

### With Error State

```blade
<x-eplus::file-upload
    name="required-file"
    label="Required Document"
    error="Please upload a valid document"
/>
```

### With Livewire Integration

```blade
<x-eplus::file-upload
    name="attachment"
    label="Attachment"
    wire:model="attachment"
    :progress="true"
/>
```

## Styling

The component includes:
- Modern drag and drop interface
- File type validation
- File size validation
- Multiple file support
- Progress indicator
- File preview list with size display
- Remove file functionality
- Dark mode support
- Error states
- Loading states
- Hover and focus states
- Accessible design
- Responsive layout 