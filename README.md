# Command to use to test before pushing any changes:
Make sure that you are in the 'public' directory, save all work before testing:
...\propertease\public
```
php -S localhost:8000
```

## How to Update Your Branch with Latest Changes from Main:

### Save your work:

Before proceeding, make sure to save your work and are located in the 'propertease' directory : ...\propertease

```bash
git add .
git commit -m "Save work before updating branch"
```

### Fetch the latest changes from the main branch:

```bash
git fetch origin main
```

### Create a temporary integration branch:

```bash
git checkout -b integration origin/main
```

### Rebase your branch onto the integration branch:

```bash
git checkout <your_branch>
git rebase integration
```

### Resolve any conflicts:

If conflicts occur during the rebase, resolve them and continue:

```bash
git rebase --continue
```

### Push the updated branch:

Push the changes to your remote branch:

```bash
git push origin <your_branch>
```

### Delete the integration branch:

If no longer needed, delete the temporary integration branch:

```bash
git branch -d integration
```
