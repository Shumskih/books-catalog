use std::io::Result;
use std::fs;

fn main() -> Result<()> {
    remove_dir()?;
    Ok(())
}

fn remove_dir() -> Result<()> {
    fs::remove_dir_all("./public/uploads")?;
    Ok(())
}
