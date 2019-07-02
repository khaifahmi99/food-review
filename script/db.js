db.enablePersistence()
    .catch((e) => {
        if(e.code == 'failed-precondition') {
            console.log('Persistence failed');
        } else if(e.code == 'unimplemented') {
            console.log('browser not supporting');
        }
    })

db.collection('reviews').onSnapshot((snapshots) => {
    snapshots.docChanges().forEach((change) => {
        // handle added data in the db
        if(change.type == "added") {
            // console.log(change.doc.data());
            renderReview(change.doc.data(), change.doc.id)
        }
        // handle deleted data in the db
        if(change.type == "removed") {

        }
    })
});

