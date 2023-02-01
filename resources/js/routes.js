window.ROUTES = {
    route: (path, params = null) => {
        let newPath = path;
        const regex = new RegExp(/{.*?}|{.*\??}/);
        if (params) {
            if (Array.isArray(params)) {
                while (params.length) {
                    newPath = newPath.replace(regex, params.shift());
                }
            } else {
                newPath = newPath.replace(regex, params);
            }
        }
        if (regex.test(newPath)) {
            newPath = newPath.replaceAll(regex, '');
        }
        return `${APP_URI}/${newPath}`;
    },
    evidences: {
        index: 'evidences/{id?}',
        store: 'evidences',
        create: 'evidences/create',
        edit: 'evidences/{id}/edit',
        update: 'evidences/{id}/update',
        destroy: 'evidences/{id}/destroy',
    },
    storageLocation: {
        index: 'storage-location',
        store: 'storage-location',
        create: 'storage-location/create',
        edit: 'storage-location/{id}/edit',
        update: 'storage-location/{id}/update',
        destroy: 'storage-location/{id}/destroy',
    }
};
