<x-app-layout title="Add Domain">

    <div class="container">

        <section class="border p-3">

            <h2 class="fs-6 mb-4">ADD DOMAIN</h2>

            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">Domain Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="nameHelp" name="name">
                    <div id="nameHelp" class="form-text">Enter just the TLD you want to keep track on.</div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </section>

    </div>
</x-app-layout>
